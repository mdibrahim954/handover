$(document).ready(function () {
  const $orderItems = $(".ndev-order");
  const $printButton = $("#ndev-print-invoice");
  const $daySelect = $("#ndev-invoice-day-selection");
  const $limitSelect = $("#ndev-invoice-limit-selection");
  const $filterInvoice = $("#ndev-print-invoice-filter");
  const $tableBody = $("#ndev-table-data");
  const $papers = $(".divPrintContentPapers");
  const $selectAll = $("#select_all");
  const $paginationWrap = $(".dataTables_paginate.paging_simple_numbers");
  $paginationWrap.attr("data-page", 1);
  const $domain = window.location.origin;
  const orderActions = [
    { path: "insert_qty", label: "Insert Qty", dividerAfter: true },
    { path: "pickup", label: "Pickup Task", dividerAfter: true },
    { path: "delivery", label: "Delivery Task", dividerAfter: true },
    { path: "task_assign", label: "Assign Person", dividerAfter: true },
    { path: "order_edit", label: "Edit Order", dividerAfter: true },
    { path: "delete_order", label: "Delete" },
  ];
  const pathname = window.location.pathname;
  const adminIndex = pathname.indexOf("/admin/");
  const appBase = adminIndex !== -1 ? pathname.substring(0, adminIndex) : "";
  const api = appBase
    ? `${$domain}${appBase}/admin/api/invoice/`
    : `${$domain}/admin/api/invoice/`;
  const options = [];

  function idtocallapi(id, callback) {
    const search = api + "?order_id=" + id;
    return callback(search);
  }

  function callApi(rApi, callback) {
    $.ajax({
      type: "GET",
      url: rApi,
      dataType: "json",
      success: function (response) {
        return callback(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        const error = {
          error: true,
          xhr,
          ajaxOptions,
          thrownError,
        };
        return callback(error);
      },
    });
  }

  let _checked = false;

  $filterInvoice.on("click", function () {
    const $limit = Number($limitSelect.val());
    _checked = true;
    $paginationWrap.attr("data-page", 1);
    handleOrdertable(1, _checked);
  });

  $(document).on("click", "#ndev-print-invoice", function () {
    // alert("Button clicked");
    // console.log($orderItems);

    const $checked = $(".ndev-order:checked");
    $papers.empty();
    if ($checked.length > 0) {
      $("#ndev-ivoices-model").show();
    }

    $checked.each(function (i, e) {
      const id = $(e).val();
      // console.log(id);
      const cleanApi = api + "?order_id=" + id;
      idtocallapi(id, () => {
        callApi(cleanApi, function (response) {
          if (response.error) {
            alert(response.thrownError);
            return;
          } else {
            const data = response;
            // console.log(data);
            // $papers.empty();
            $papers.append(genarate_invoice(response));

            $(document).on("click", "#btnClose", function () {
              $("#ndev-ivoices-model").hide();
            });

            $(".ndev-print-invoice").on("click", function () {
              // let $invoice = $(".ndev-invoice");
              printInvoices();
            });
          }
        });
      });
    });
  });

  $(document).on("click", ".ndev-single-printer-button", function () {
    const id = $(this).data("id");
    $papers.empty();
    const cleanApi = api + "?order_id=" + id;
    idtocallapi(id, () => {
      callApi(cleanApi, function (response) {
        if (response.error) {
          alert(response.thrownError);
          return;
        } else {
          const data = response;
          // console.log(data);
          // $papers.empty();
          $papers.append(genarate_invoice(response));

          $("#ndev-ivoices-model").show();
          $(document).on("click", "#btnClose", function () {
            $("#ndev-ivoices-model").hide();
          });

          $(".ndev-print-invoice").on("click", function () {
            // let $invoice = $(".ndev-invoice");
            printInvoices();
          });
        }
      });
    });
    // console.log(id);
  });

  $("select[name='example_length']").on("change", function () {
    _checked = false;
    handleOrdertable(1, _checked);
  });

  function genarate_invoice(row = {}) {
    // console.log(row);
    const order = row.order;
    const order_details = row.order_details;
    const refarence_user = row.refarence_user;
    const printed_by = row.printed_by;

    // console.log(printed_by);

    const today = new Date().toISOString().split("T")[0];
    const items = order_details.length ? order_details : [];

    let total_price = 0;
    let orderRows = "";

    items.forEach(function (item) {
      let rowTotal = "";
      if (
        item.quantity !== "" &&
        item.quantity != null &&
        item.unit_price !== "" &&
        item.unit_price != null
      ) {
        rowTotal = item.quantity * item.unit_price;
        total_price += rowTotal;
      }
      orderRows += `<tr>`;
      orderRows += `<td>${item.item_name || ""}</td>`;
      orderRows += `<td>${item.quantity || ""}</td>`;
      orderRows += `<td>${item.unit_price || ""}</td>`;
      orderRows += `<td>${rowTotal}</td>`;
      orderRows += `</tr>`;
    });

    let parcel_id = null;
    if (order.redx_tracking_id) {
      parcel_id = order.redx_tracking_id;
    } else if (order.steadfast_parcel_id) {
      parcel_id = order.steadfast_parcel_id;
    } else if (order.pathao_consignment_id) {
      parcel_id = order.pathao_consignment_id;
    }

    const showParcelId =
      [133, 130, 126].includes(Number(order.delivery_area_id)) && parcel_id;
    const parcelHtml = showParcelId
      ? `<div style="font-weight:900;font-size:28px;text-align: left">Parcel ID : ${parcel_id}</div>`
      : `<div style="font-weight:900;font-size:28px;text-align: left">Parcel ID : No Id</div>`;

    let orderBy = "";
    if (order.order_created_by && order.order_created_by != 0) {
      // console.log(order.order_created_by);

      orderBy =
        refarence_user.order_by ||
        `${refarence_user.first_name || ""} ${
          refarence_user.last_name || ""
        }`.trim();
    }

    const printedBy = printed_by.length
      ? `${printed_by.first_name || ""} ${printed_by.last_name || ""}`.trim()
      : "";
    const created_date = order.created_at ? order.created_at.split(" ")[0] : "";

    let html = `<div _ngcontent-c0="" class="print  ndev-invoice" style="padding: 20px 0; border-bottom: 1px dotted #eee;"> `;
    html += `<div _ngcontent-c0="" style="width:100%;display:block;height:130px;position:relative;">`;
    html += `<div _ngcontent-c0="" style="width:200px;">`;
    html += `<img _ngcontent-c0="" src="${$domain}/assets/images/logo.jpg" style="width:170px;height:120px;margin:0px auto;">`;
    html += `</div>`;
    html += `<div _ngcontent-c0="" style="position:absolute;top:10px;right:10px;text-align:right">`;
    html += `<p _ngcontent-c0=""> Track Number: <b _ngcontent-c0="">${
      order.track_number || ""
    }</b></p>`;
    html += `<p _ngcontent-c0=""> Ref Invoice: <b _ngcontent-c0="">${
      order.reference_invoice || ""
    }</b></p>`;
    html += `<p _ngcontent-c0="">Date: ${today}</p>`;
    html += `</div>`;
    html += `</div>`;
    html += `<div _ngcontent-c0="" style="margin:5px;font-size:14px;">`;
    html += `<b>Pickup Address:</b> ${order.seller_name || ""}, ${
      order.seller_address || ""
    }, Mob: ${order.seller_mobile || ""}</div>`;
    html += `<div _ngcontent-c0="" style="margin:10px 5px 5px;font-size:16px;">`;
    html += `<b>Delivery Address: ${order.customer_name || ""}, ${
      order.customer_address || ""
    }, Mob: ${order.customer_mobile || ""}</b></div>`;
    html += `<div _ngcontent-c0="">`;
    html += `<table _ngcontent-c0="" class="table table-sm table-hover table-bordered orderDetails">`;
    html += `<thead _ngcontent-c0="">`;
    html += `<tr _ngcontent-c0="">`;
    html += `<th _ngcontent-c0="">Item Name</th>`;
    html += `<th _ngcontent-c0="">Qty.</th>`;
    html += `<th _ngcontent-c0="" style="text-align:center">U. Price</th>`;
    html += `<th _ngcontent-c0="" style="text-align:center">Amount</th>`;
    html += `</tr>`;
    html += `</thead>`;
    html += `<tbody _ngcontent-c0="">`;
    html += orderRows;
    html += `</tbody>`;
    html += `<tfoot _ngcontent-c0="">`;
    html += `<tr _ngcontent-c0="">`;
    html += `<td _ngcontent-c0="" colspan="3" style="text-align:right;">Total</td>`;
    html += `<td _ngcontent-c0="" style="width:60px; text-align:right;font-weight:bold">${total_price}</td>`;
    html += `</tr>`;
    html += `</tfoot>`;
    html += `</table>`;
    html += `</div>`;
    html += `<div _ngcontent-c0="" id="divPriceInWords" style="margin-left:10px;margin-top:5px;text-align:center;"> </div>`;
    html += `<table _ngcontent-c0="" style="width:100%;margin-top:10px;">`;
    html += `<tbody _ngcontent-c0=""><tr _ngcontent-c0="">`;
    html += `<td _ngcontent-c0="" style="width:55%;">`;
    html += `<div _ngcontent-c0="" style="width:100%;">`;
    html += `<div _ngcontent-c0="" style="margin:0px;margin-top:5px;font-weight:bold;font-size:13px;">Handover Express</div>`;
    html += `<div _ngcontent-c0="" style="margin:0px;">Hotline: 01872-737 757</div>`;
    html += `<div _ngcontent-c0="" style="margin:0px;">info@handoverexpressbd.com<br _ngcontent-c0="">www.handoverexpressbd.com</div>`;
    html += `</div>`;
    html += `</td>`;
    html += `<td _ngcontent-c0="" style="width:44%;">`;
    html += `<div _ngcontent-c0="" style="margin-top:50px; width:100%;padding-top:5px;border-top:1px dashed #A6A6A6">Customer Sign</div>`;
    html += `</td>`;
    html += `</tr>`;
    html += `</tbody></table>`;
    html += `<div _ngcontent-c0="" style="width:100%;text-align:center;margin:0px;">`;
    html += `<div _ngcontent-c0="" style="width:100%;text-align:center;margin:0px;">`;
    html += `<!--<svg _ngcontent-c0="" id="qrcode"></svg>-->`;
    html += `<svg id="barcode_${order.order_id}"></svg>`;
    html += `</div>`;
    html += `<!--http://lindell.me/JsBarcode/-->`;
    html += `<script>`;
    html += `JsBarcode("#barcode_${order.order_id}", ${order.order_id}, { width: 5, height: 30, displayValue: false });`;
    html += `</script>`;
    html += `<div style="font-size:10px;width:100%;margin-top:5px;text-align:center ">THANK YOU FOR SHOPPING WITH US</div>`;
    html += parcelHtml;
    html += `<hr>`;
    html += `<p class="deliveryClass" style=" margin-right: 8%;font-size: xx-large;font-weight: 900;float: right;">${
      order.delivery_area || ""
    }</p>`;
    html += `<div style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Order By: ${orderBy}</div>`;
    html += `<div style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Printed By: ${printedBy}</div>`;
    html += `<div style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Order Created Date: ${created_date}</div>`;
    html += `<div style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Delivery Man Note: ${
      order.deliveryman_note || ""
    }</div>`;
    html += `</div>`;
    html += `</div>`;

    return html;
  }

  function genrateTablesRow(data, inputBoxCheck) {
    console.log(data);

    // if (data.order_state_info.orderstateid.trim() !== "13") return;

    let $html = "";
    // console.log("Check box inpck: ", inputBoxCheck);

    $html += `<tr class="delete_order_div_85866 odd" role="row">`;
    $html += `<td><input type="checkbox"  class="checkbox ndev-order" name="order_id[]" ${
      inputBoxCheck ? "checked" : ""
    } value="${data.order.order_id}"></td>`;
    $html += `<td><a href="${$domain}/admin/report/order_details/${data.order.track_number}" target="_blank" bis_skin_checked="1">${data.order.track_number}</a></td>`;
    $html += `<td class="d-flex" ><i _ngcontent-c0="" aria-hidden="true" class="fa fa-print ndev-single-printer-button" data-id="${data.order.order_id}" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i> `;
    $html += `<span class="ndev-dropdown-menu" >`;
    $html += `<i _ngcontent-c0="" aria-hidden="true" class="fa fa-bars " data-toggle="dropdown" style="font-size:20px;cursor:pointer;" aria-expanded="false"></i>`;
    $html += `<ul _ngcontent-c0="" class="dropdown-menu dropdown-menu-right">`;
    $html += orderActions
      .map(
        ({ path, label, dividerAfter }) =>
          `<li _ngcontent-c0=""><a href="${$domain}/admin/order/${path}/${
            data.order.order_id
          }" target="_blank" bis_skin_checked="1">${label}</a></li>${
            dividerAfter ? '<li _ngcontent-c0="" class="divider"></li>' : ""
          }`
      )
      .join("");
    $html += `</ul>`;
    $html += `</span>`;
    $html += `</td>`;
    $html += `<td><span style="background: ${data.order_state_info.state_color} ;border-radius: 3px; color:white; padding:3px">${data.order_state_info.orderstatename}</span></td>`;

    // $html += `<td class="sorting_1">${data.order_state_info.created_at}</td>`;
    $html += `<td class="sorting_1">${data.order.created_at}</td>`;
    $html += `<td>${data.pickup_info.area_name} <br> ${data.order.pickup_time}</td>`;
    // $html += `<td class="sorting_1">${data.order_state_info.updated_at}</td>`;
    $html += `<td>${data.order.seller_name}<br>${data.order.seller_mobile}<br>${data.order.seller_address}</td>`;
    $html += `<td>${data.order.customer_name}<br>${data.order.customer_mobile}<br>${data.order.customer_address}</td>`;
    $html += `<td>${data.area_info.area_name} <br>${data.order.delivery_time}</td>`;
    $html += `<td>${data.order.reference_invoice}</td>`;
    $html += `</tr>`;

    return $html;
  }

  function printInvoices() {
    const $content = $(".divPrintContentPapers").clone();

    $content.find(".ndev-invoice").css({
      pageBreakAfter: "auto",
      breakAfter: "auto",
      pageBreakInside: "avoid",
      breakInside: "avoid",
    });
    $content.find(".ndev-invoice:not(:last-child)").css({
      pageBreakAfter: "always",
      breakAfter: "page",
    });
    $content.find("script").remove();

    const printwin = window.open(
      "",
      "printwin",
      "width=900,height=700,scrollbars=yes"
    );
    if (!printwin) {
      alert("Please allow popups to print.");
      return;
    }

    printwin.document.open();
    printwin.document.write("<!DOCTYPE html><html><head><title>Print</title>");
    printwin.document.write(
      '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">'
    );
    printwin.document.write(
      "<style>body{margin:0;}.ndev-invoice{page-break-inside:avoid;break-inside:avoid;}.ndev-invoice:not(:last-child){page-break-after:always;break-after:page;}</style>"
    );
    printwin.document.write("</head><body>");
    printwin.document.write($content.html());
    printwin.document.write("</body></html>");
    printwin.document.close();

    printwin.onload = function () {
      setTimeout(function () {
        printwin.focus();
        printwin.print();
        printwin.close();
      }, 300);
    };
  }

  handleOrdertable(1, false);
  function handleOrdertable(page = 1, checked) {
    // const api = `${$domain}/admin/api/invoice/`;
    const perpage = $("select[name='example_length']").val();
    const $day = $daySelect.val();
    const $limit = Number($limitSelect.val());

    const cleanPerpageNumber =
      $day.toString() !== "0"
        ? typeof $limit === "number" && $limit !== 0
          ? $limit
          : Number(perpage)
        : Number(perpage);
    const peramiter = `?limit=${cleanPerpageNumber}&page=${page}`;

    const dayPerameter = `?day=${$day}&limit=${cleanPerpageNumber}&page=${page}`;

    const filterPerameters = $day.toString() !== "0" ? dayPerameter : peramiter;

    const _selectAll = $selectAll.is(":checked");

    checked = _selectAll ?? checked;

    $.ajax({
      type: "GET",
      url: api + filterPerameters,
      dataType: "JSON",
      beforeSend: function () {
        // $tableBody.empty();
        const $html = `<div class="ndev-loader-wrap"><div class="ndev-loader-body" ><div class="ndev-spin-loader" role="status"></div> <span>Order Loading...</span></div></div>`;
        $tableBody.append($html);

        $tableBody.height("400px");
        // console.log("Before send function called");
      },
      success: function (response) {
        // console.log(checked);
        // const $html = genrateTablesRow(response.data);
        // $tableBody.append($html);
        $tableBody.height("auto");
        $tableBody.empty();
        console.log(response.total);

        $.each(response.data, function (i, dataItem) {
          $rows = genrateTablesRow(dataItem, checked);

          $tableBody.append($rows);

          // console.log(dataItem);
        });
        renderPagination(response.total, cleanPerpageNumber, 10, page);
      },
      error: function (e) {
        console.log(e);
      },
    });
  }

  // Register click event only ONCE
  $(document).off("click", ".paginate_button");

  $(document).on("click", ".paginate_button", function (e) {
    e.preventDefault();

    if ($(this).hasClass("disabled")) return;

    const page = Number($(this).attr("data-index"));

    if (Number($paginationWrap.attr("data-page")) === page) {
      let $html = `<div class="ndev-loader-wrap"><div class="ndev-loader-body" ><i class="fa fa-check" style="color: #27ae60 ;" ></i> <span>You are now on page ${page}.</span></div></div>`;
      $tableBody.append($html);

      setTimeout(() => {
        $(".ndev-loader-wrap").remove();
      }, 5000);
      return;
    }

    if (!page) return;

    currentPage = page;

    $paginationWrap.attr("data-page", currentPage);

    handleOrdertable(currentPage, _checked);

    // renderPagination(total, perpage, limit, currentPage);

    // console.log("Current Page:", currentPage);

    // Load your table data here
    // loadData(currentPage);
  });

  function renderPagination(total, perpage, limit, currentPage) {
    const totalPages = Math.ceil(total / perpage);

    // console.log("Total pags: ", total, perpage);

    const currentGroup = Math.floor((currentPage - 1) / limit);

    const startPage = currentGroup * limit + 1;

    const endPage = Math.min(startPage + limit - 1, totalPages);

    let html = "";

    // Previous
    html += `
        <a
            class="paginate_button previous ${
              currentPage == 1 ? "disabled" : ""
            }"
            data-index="${currentPage - 1}">
            Previous
        </a>
    `;

    // First page
    if (startPage > 1) {
      html += `
            <a class="paginate_button" data-index="1">1</a>
        `;

      if (startPage > 2) {
        html += `<span class="paginate_button disabled">...</span>`;
      }
    }

    // Page buttons
    for (let i = startPage; i <= endPage; i++) {
      html += `
            <a
                class="paginate_button ${i == currentPage ? "current" : ""}"
                data-index="${i}">
                ${i}
            </a>
        `;
    }

    // Last page
    if (endPage < totalPages) {
      if (endPage < totalPages - 1) {
        html += `<span class="paginate_button disabled">...</span>`;
      }

      html += `
            <a
                class="paginate_button"
                data-index="${totalPages}">
                ${totalPages}
            </a>
        `;
    }

    // Next
    html += `
        <a
            class="paginate_button next ${
              currentPage == totalPages ? "disabled" : ""
            }"
            data-index="${currentPage + 1}">
            Next
        </a>
    `;

    $(".dataTables_paginate.paging_simple_numbers").html(html);
  }
});
