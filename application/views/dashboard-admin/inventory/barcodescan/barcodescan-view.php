<?php
if (isset($header)) {
    echo $header;
}
?>

<style>
    .barcode-scan-page {
        max-width: 900px;
        margin: 40px auto;
    }

    .barcode-scan-card {
        padding: 24px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #fff;
    }

    .barcode-scan-card h4 {
        margin-top: 0;
        font-weight: 700;
    }

    .barcode-scan-card p {
        color: #64748b;
    }

    #camera-reader {
        width: 100%;
        max-width: 520px;
        margin: 16px auto;
    }

    #camera-reader video {
        border-radius: 6px;
    }

    .barcode-scan-status {
        display: none;
        margin-top: 20px;
    }

    .barcode-product-result {
        display: none;
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #d1e7dd;
        border-radius: 8px;
        background: #f0fdf4;
    }

    .barcode-product-result h4 {
        margin-top: 0;
    }

    .barcode-product-result dl {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 12px;
        margin: 0;
    }

    .barcode-product-result dt {
        color: #64748b;
        font-size: 12px;
        text-transform: uppercase;
    }

    .barcode-product-result dd {
        margin: 4px 0 0;
        color: #111827;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    @media (max-width: 767px) {
        .barcode-scan-page {
            margin: 20px 10px;
        }

        .barcode-scan-card {
            margin-bottom: 16px;
            padding: 18px;
        }
    }
</style>

<main class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <div class="barcode-scan-page">
        <h3>Scan Product Barcode</h3>
        <p>Choose either a handheld barcode scanner or your mobile device camera.</p>

        <div class="row">
            <div class="col-md-6">
                <section class="barcode-scan-card">
                    <h4><i class="fa fa-barcode" aria-hidden="true"></i> External barcode scanner</h4>
                    <p>Connect a USB or Bluetooth scanner. Click the field, scan the label, and the product will be looked up automatically when the scanner sends Enter.</p>
                    <form id="external-scanner-form" action="<?php echo base_url(); ?>admin/barcodescan/lookup" method="post">
                        <div class="form-group">
                            <label for="external-barcode">Barcode / item code</label>
                            <input
                                class="form-control"
                                id="external-barcode"
                                name="barcode"
                                type="text"
                                autocomplete="off"
                                placeholder="Scan barcode here"
                                required
                                autofocus
                            >
                        </div>
                        <button class="btn btn-primary" type="submit">Find product</button>
                    </form>
                </section>
            </div>

            <div class="col-md-6">
                <section class="barcode-scan-card">
                    <h4><i class="fa fa-camera" aria-hidden="true"></i> Mobile camera scanner</h4>
                    <p>Use your phone's rear camera to scan a Code 128 barcode. Camera access requires HTTPS (or localhost) and your permission.</p>
                    <button class="btn btn-success" id="start-camera" type="button">Start camera</button>
                    <button class="btn btn-default" id="stop-camera" type="button" disabled>Stop camera</button>
                    <div id="camera-reader"></div>
                </section>
            </div>
        </div>

        <div class="alert barcode-scan-status" id="barcode-scan-status" role="status" aria-live="polite"></div>
        <section class="barcode-product-result" id="barcode-product-result" aria-live="polite">
            <h4 id="product-name"></h4>
            <dl>
                <div>
                    <dt>Item code</dt>
                    <dd id="product-item-code"></dd>
                </div>
                <div>
                    <dt>Category</dt>
                    <dd id="product-category"></dd>
                </div>
                <div>
                    <dt>Available quantity</dt>
                    <dd id="product-quantity"></dd>
                </div>
                <div id="serial-number-row" hidden>
                    <dt>Serial number</dt>
                    <dd id="product-serial-number"></dd>
                </div>
                <div id="product-solded-row" hidden>
                    <dt>Sale status</dt>
                    <dd id="product-sold-status"></dd>
                </div>
            </dl>
            <button class="btn btn-warning" id="mark-sold-button" type="button" disabled>Mark as sold</button>
        </section>
        <p style="margin-top:20px;">
            <a class="btn btn-default" href="<?php echo base_url(); ?>admin/product/all">Back to products</a>
        </p>
    </div>
</main>

<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
    (function () {
        const form = document.getElementById('external-scanner-form');
        const externalBarcode = document.getElementById('external-barcode');
        const status = document.getElementById('barcode-scan-status');
        const result = document.getElementById('barcode-product-result');
        const startCameraButton = document.getElementById('start-camera');
        const stopCameraButton = document.getElementById('stop-camera');
        const soldStatusRow = document.getElementById('product-solded-row');
        const soldStatus = document.getElementById('product-sold-status');
        const markSoldButton = document.getElementById('mark-sold-button');
        const markSoldUrl = <?php echo json_encode(base_url() . 'admin/barcodescan/mark_sold', JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        let cameraScanner = null;
        let cameraRunning = false;
        let lookupInProgress = false;
        let currentBarcode = '';

        function showStatus(message, isError) {
            status.textContent = message;
            status.className = 'alert barcode-scan-status ' + (isError ? 'alert-danger' : 'alert-info');
            status.style.display = 'block';
        }

        function showProduct(product, barcode) {
            document.getElementById('product-name').textContent = product.name;
            document.getElementById('product-item-code').textContent = product.item_code;
            document.getElementById('product-category').textContent = product.category;
            document.getElementById('product-quantity').textContent = product.quantity;

            const serialRow = document.getElementById('serial-number-row');
            serialRow.hidden = !product.serial_number;
            document.getElementById('product-serial-number').textContent = product.serial_number || '';

            soldStatusRow.hidden = !product.serial_number;
            if (product.serial_number && !product.serial_tracked) {
                soldStatus.textContent = 'Not sold';
            } else if (product.serial_number) {
                soldStatus.textContent = Number(product.sold) === 1 ? 'Sold-Out' : 'Sold';

                soldStatus.style.color = Number(product.sold) === 1 ? "#FF0E0E" : "#000";
            } else {
                soldStatus.textContent = '';
            }
            currentBarcode = product.serial_number ? barcode : '';
            markSoldButton.disabled = !product.serial_number || Number(product.sold) === 1;
            markSoldButton.textContent = Number(product.sold) === 1 ? 'Already sold-out' : 'Mark as sold';

            result.style.display = 'block';
            status.style.display = 'none';
        }

        async function lookupBarcode(barcode) {
            const scannedValue = barcode.trim();
            if (!scannedValue || lookupInProgress) {
                return;
            }

            lookupInProgress = true;
            result.style.display = 'none';
            showStatus('Looking up barcode…', false);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
                    body: new URLSearchParams({ barcode: scannedValue }).toString()
                });
                const data = await response.json();

                if (!response.ok || !data.success) {
                    showStatus(data.message || 'The barcode could not be looked up.', true);
                    return;
                }

                showProduct(data.product, scannedValue);
            } catch (error) {
                const message = error && error.message ? error.message : String(error);
                showStatus('Barcode lookup failed: ' + message, true);
            } finally {
                lookupInProgress = false;
                externalBarcode.value = '';
                externalBarcode.focus();
            }
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            lookupBarcode(externalBarcode.value);
        });

        markSoldButton.addEventListener('click', async function () {
            if (!currentBarcode || markSoldButton.disabled) {
                return;
            }

            markSoldButton.disabled = true;
            markSoldButton.textContent = 'Updating…';
            try {
                const response = await fetch(markSoldUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
                    body: new URLSearchParams({ barcode: currentBarcode }).toString()
                });
                const data = await response.json();

                if (!response.ok || !data.success) {
                    showStatus(data.message || 'Could not update the sale status.', true);
                    markSoldButton.disabled = false;
                    markSoldButton.textContent = 'Mark as sold';
                    return;
                }

                soldStatus.textContent = Number(data.sold) === 1 ? 'Sold' : 'Not sold';
                document.getElementById('product-quantity').textContent = data.quantity;
                markSoldButton.textContent = Number(data.sold) === 1 ? 'Already sold' : 'Mark as sold';
                markSoldButton.disabled = Number(data.sold) === 1;
                showStatus(data.message || 'Sale status updated.', false);
            } catch (error) {
                showStatus('Could not contact the server. Check your connection and try again.', true);
                markSoldButton.disabled = false;
                markSoldButton.textContent = 'Mark as sold';
            }
        });

        async function stopCamera() {
            if (!cameraScanner || !cameraRunning) {
                return;
            }

            cameraRunning = false;
            try {
                await cameraScanner.stop();
                cameraScanner.clear();
            } catch (error) {
                const message = error && error.message ? error.message : String(error);
                showStatus('The camera could not be stopped: ' + message, true);
            } finally {
                startCameraButton.disabled = false;
                stopCameraButton.disabled = true;
            }
        }

        startCameraButton.addEventListener('click', async function () {
            if (typeof Html5Qrcode === 'undefined') {
                showStatus('The camera scanner library could not be loaded. Check your internet connection and reload.', true);
                return;
            }

            startCameraButton.disabled = true;
            showStatus('Starting camera…', false);

            try {
                cameraScanner = new Html5Qrcode('camera-reader', {
                    formatsToSupport: [
                        Html5QrcodeSupportedFormats.CODE_128,
                        Html5QrcodeSupportedFormats.CODE_39,
                        Html5QrcodeSupportedFormats.EAN_13,
                        Html5QrcodeSupportedFormats.EAN_8,
                        Html5QrcodeSupportedFormats.UPC_A,
                        Html5QrcodeSupportedFormats.UPC_E,
                        Html5QrcodeSupportedFormats.ITF,
                        Html5QrcodeSupportedFormats.CODABAR,
                        Html5QrcodeSupportedFormats.QR_CODE
                    ],
                    verbose: false
                });
                cameraRunning = true;
                await cameraScanner.start(
                    { facingMode: 'environment' },
                    { fps: 10 },
                    async function (decodedText) {
                        await stopCamera();
                        await lookupBarcode(decodedText);
                    },
                    function () {}
                );
                startCameraButton.disabled = true;
                stopCameraButton.disabled = false;
                showStatus('Camera active. Hold the barcode inside the scanning box.', false);
            } catch (error) {
                cameraRunning = false;
                startCameraButton.disabled = false;
                stopCameraButton.disabled = true;
                const message = error && error.message ? error.message : String(error);
                showStatus('Could not start the camera: ' + message + '. Check camera permission and use HTTPS or localhost.', true);
            }
        });

        stopCameraButton.addEventListener('click', stopCamera);
    })();
</script>

</ng-component></app-root></div></div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>
