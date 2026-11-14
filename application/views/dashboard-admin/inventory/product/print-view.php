<?php
$response_log = $this->db
    ->select('serial')
    ->where('item_code', $result->item_code)
    ->order_by('serial', 'ASC')
    ->get('inventory_log')
    ->result();

if (isset($header)) {
    echo $header;
}
?>

<style>
    .product-print-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, 3in);
        justify-content: center;
        gap: 8mm;
        margin: 20px auto;
    }

    .product-print-card {
        box-sizing: border-box;
        display: flex;
        width: 3in;
        height: 4in;
        flex-direction: column;
        padding: 3mm;
        margin: 0;
        border: 1px solid #333;
        background: #fff;
        color: #111;
        font-family: Arial, sans-serif;
        text-align: left;
        overflow: hidden;
    }

    .product-print-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 2mm;
        padding-bottom: 2mm;
        border-bottom: 1px solid #333;
    }

    .product-print-card h2 {
        margin: 0;
        font-size: 13pt;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .product-print-company {
        flex: 0 0 44%;
    }

    .product-print-company-name {
        margin: 0 0 1mm;
        font-size: 10pt;
        font-weight: 700;
    }

    .product-print-company-contact {
        margin: 0;
        font-size: 6.5pt;
        line-height: 1.3;
    }

    .product-print-name-block {
        flex: 1;
        text-align: right;
    }

    .product-print-category {
        margin: 1mm 0 0;
        color: #333;
        font-size: 8pt;
    }

    .product-print-barcode {
        display: block;
        width: 100% !important;
        max-width: none !important;
        height: 22mm !important;
        margin: 3mm auto 0;
        flex: 0 0 22mm;
    }

    .product-print-barcode-value {
        margin: 1mm 0 2mm;
        font-size: 10pt;
        font-weight: 700;
        letter-spacing: 1px;
        text-align: center;
    }

    .product-print-information {
        display: flex;
        flex: 1;
        align-items: center;
        gap: 3mm;
        padding-top: 2mm;
        border-top: 1px solid #777;
    }

    .product-print-qrcode {
        display: block;
        width: 27mm;
        height: 27mm;
        flex: 0 0 27mm;
    }

    .product-print-qrcode canvas,
    .product-print-qrcode img {
        display: block;
        width: 27mm;
        height: 27mm;
    }

    .product-print-details {
        min-width: 0;
    }

    .product-print-detail {
        margin: 0 0 2mm;
    }

    .product-print-detail:last-child {
        margin-bottom: 0;
    }

    .product-print-detail-label {
        display: block;
        margin-bottom: .5mm;
        color: #444;
        font-size: 7pt;
        font-weight: 700;
        text-transform: uppercase;
    }

    .product-print-detail-value {
        font-size: 10pt;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .product-print-actions {
        margin-bottom: 20px;
    }

    @page {
        size: 3in 4in;
        margin: 0;
    }

    @media print {
        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            background: #fff !important;
        }

        .main-navigation,
        .sidebar,
        .product-print-actions,
        #divProgressLine {
            display: none !important;
        }

        main {
            width: 100% !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .product-print-grid {
            display: block;
            width: 3in;
            margin: 0;
        }

        .product-print-card {
            width: 3in;
            height: 4in;
            margin: 0;
            padding: 3mm;
            page-break-after: always;
            break-after: page;
            page-break-inside: avoid;
            break-inside: avoid;
            overflow: hidden;
        }

        .product-print-card:last-of-type {
            page-break-after: auto;
            break-after: auto;
        }

        .product-print-card,
        .product-print-card * {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

<main class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <div class="product-print-actions text-center">
        <button class="btn btn-primary" type="button" onclick="printProductBarcodes()">Print</button>
        <a class="btn btn-default" href="<?php echo base_url(); ?>admin/product/all">Back to products</a>
    </div>
    <?php if (empty($response_log)) { ?>
        <p class="text-center">No serial-number records are available for this product.</p>
    <?php } else {
        echo '<div class="product-print-grid">';
        foreach ($response_log as $key => $item) { ?>
        <section class="product-print-card mb-3">
            <header class="product-print-header">
                <div class="product-print-company">
                    <p class="product-print-company-name">Handover Express</p>
                    <p class="product-print-company-contact">
                        225, New Elephant Road, Dhaka - 1205<br>
                        Call center: 01872-737-757
                    </p>
                </div>
                <div class="product-print-name-block">
                    <h2><?php echo html_escape($result->name); ?></h2>
                    <p class="product-print-category"><?php echo !empty($category) ? html_escape($category->name) : 'Inventory item'; ?></p>
                </div>
            </header>
            <svg class="product-print-barcode" id="product-item-code-<?php echo $key; ?>"></svg>
            <p class="product-print-barcode-value"><?php echo html_escape((string) $result->item_code) . '-' . html_escape((string) $item->serial); ?></p>
            <div class="product-print-information">
                <div class="product-print-qrcode" id="product-item-code-ev-<?php echo $key; ?>"></div>
                <div class="product-print-details">
                    <div class="product-print-detail">
                        <span class="product-print-detail-label">Item code</span>
                        <span class="product-print-detail-value"><?php echo html_escape((string) $result->item_code); ?></span>
                    </div>
                    <div class="product-print-detail">
                        <span class="product-print-detail-label">Serial number</span>
                        <span class="product-print-detail-value"><?php echo html_escape((string) $item->serial); ?></span>
                    </div>
                </div>
            </div>
        </section>
    <?php }
        echo '</div>';
    } ?>
</main>

<script src="<?php echo base_url(); ?>assets/js/jquery.qrcode.min.js"></script>
<script>
    const inventoryLog = <?php echo json_encode($response_log, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
    const itemPageUrl = <?php echo json_encode(rtrim(base_url(), '/') . '/item/', JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
    const productBarcodeItemCode = <?php echo json_encode((string) $result->item_code, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;

    window.addEventListener('load', function () {
        inventoryLog.forEach(function (item, i) {
            JsBarcode(`#product-item-code-${i}`, productBarcodeItemCode + '-' + item.serial, {
                format: 'CODE128',
                displayValue: false,
                width: 2,
                height: 80,
                margin: 0
            });
            document.getElementById(`product-item-code-${i}`).setAttribute('preserveAspectRatio', 'none');

            const itemUrl = itemPageUrl + '?item=' + encodeURIComponent(productBarcodeItemCode) + '&serial=' + encodeURIComponent(String(item.serial));
            new QRCode(document.getElementById(`product-item-code-ev-${i}`), {
                text: itemUrl,
                width: 180,
                height: 180,
                correctLevel: QRCode.CorrectLevel.M
            });
        });
    });

    function printProductBarcodes() {
        if (inventoryLog.length < 1) {
            window.alert('There are no product barcodes to print.');
            return;
        }

        const printWindow = window.open('', '_blank', 'width=900,height=700');
        if (!printWindow) {
            window.alert('Allow pop-ups to print the product barcodes.');
            return;
        }

        const printDocument = printWindow.document;
        printDocument.title = 'Product barcodes';

        const style = printDocument.createElement('style');
        style.textContent = `
            @page { size: 3in 4in; margin: 0; }
            * { box-sizing: border-box; }
            html,
            body {
                width: 3in;
                min-width: 3in;
                max-width: 3in;
                margin: 0;
                padding: 0;
                color: #111;
                font-family: Arial, sans-serif;
            }
            .product-print-card {
                display: flex;
                width: 3in;
                min-width: 3in;
                max-width: 3in;
                height: 4in;
                min-height: 4in;
                max-height: 4in;
                flex-direction: column;
                margin: 0;
                padding: 3mm;
                border: 1px solid #333;
                text-align: left;
                overflow: hidden;
                page-break-after: always;
                break-after: page;
                page-break-inside: avoid;
                break-inside: avoid;
            }
            .product-print-card:last-child {
                page-break-after: auto;
                break-after: auto;
            }
            .product-print-header {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 2mm;
                padding-bottom: 2mm;
                border-bottom: 1px solid #333;
            }
            .product-print-card h2 {
                margin: 0;
                font-size: 13pt;
                font-weight: 700;
                overflow-wrap: anywhere;
            }
            .product-print-company {
                flex: 0 0 44%;
            }
            .product-print-company-name {
                margin: 0 0 1mm;
                font-size: 10pt;
                font-weight: 700;
            }
            .product-print-company-contact {
                margin: 0;
                font-size: 6.5pt;
                line-height: 1.3;
            }
            .product-print-name-block {
                flex: 1;
                text-align: right;
            }
            .product-print-category {
                margin: 1mm 0 0;
                color: #333;
                font-size: 8pt;
            }
            .product-print-barcode {
                display: block;
                box-sizing: border-box;
                width: 100% !important;
                max-width: none !important;
                height: 22mm !important;
                margin: 3mm auto 0;
                flex: 0 0 22mm;
            }
            .product-print-barcode-value {
                margin: 1mm 0 2mm;
                font-size: 10pt;
                font-weight: 700;
                letter-spacing: 1px;
                text-align: center;
            }
            .product-print-qrcode {
                display: block;
                width: 27mm;
                height: 27mm;
                flex: 0 0 27mm;
            }
            .product-print-qrcode canvas,
            .product-print-qrcode img {
                display: block;
                width: 27mm;
                height: 27mm;
            }
            .product-print-information {
                display: flex;
                flex: 1;
                align-items: center;
                gap: 3mm;
                padding-top: 2mm;
                border-top: 1px solid #777;
            }
            .product-print-details {
                min-width: 0;
            }
            .product-print-detail {
                margin: 0 0 2mm;
            }
            .product-print-detail:last-child {
                margin-bottom: 0;
            }
            .product-print-detail-label {
                display: block;
                margin-bottom: .5mm;
                color: #444;
                font-size: 7pt;
                font-weight: 700;
                text-transform: uppercase;
            }
            .product-print-detail-value {
                font-size: 10pt;
                font-weight: 700;
                overflow-wrap: anywhere;
            }
            @media print {
                .product-print-card,
                .product-print-card * {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }
            }
        `;
        printDocument.head.appendChild(style);

        document.querySelectorAll('.product-print-card').forEach(function (card) {
            const printCard = card.cloneNode(true);
            card.querySelectorAll('.product-print-qrcode').forEach(function (qrContainer) {
                const canvas = qrContainer.querySelector('canvas');
                const clonedQrContainer = printCard.querySelector('#' + qrContainer.id);
                if (canvas && clonedQrContainer) {
                    const qrImage = printDocument.createElement('img');
                    qrImage.src = canvas.toDataURL('image/png');
                    qrImage.alt = 'QR code';
                    clonedQrContainer.replaceChildren(qrImage);
                }
            });
            printDocument.body.appendChild(printCard);
        });

        printWindow.addEventListener('afterprint', function () {
            printWindow.close();
        });
        printWindow.focus();
        printWindow.print();
    }
</script>

</ng-component></app-root></div></div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>