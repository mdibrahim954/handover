// alert(1)
$(document).ready(function () {
  //   alert("Rady....");
  const $customerMobile = $("#customermobile");
  const $customeraddress = $("#customeraddress");
  const phoneNumberPattern = /^[0-9]{9,15}$/;
  const $customerAddressList = $customerMobile.parent(".input-group");
  const $listData = $('<ul class="address-results"></ul>').appendTo(
    $customerAddressList
  );
  // Get dommain with https or http
  const $domain = window.location.origin;
  const orderStateFilter = $("#example").data("order-state-filter");
  // Per page of items

  // ${$limit}?per_page=${25}&page=${$page}
  let $orders_filter_api = `${$domain}/admin/api/get-orders/`;

  let $order_search_api = `${$domain}/admin/api/get-address/`;

  // console.log("Domain : ", $domain);
  let $ajaxRequest = null; // track in-flight request
  let $debounceTimer = null;

  $customerMobile.on("input", function () {
    const phoneNumber = $(this).val();

    // Clear previous debounce
    clearTimeout($debounceTimer);

    // Abort previous in-flight request
    if ($ajaxRequest) {
      $ajaxRequest.abort();
      $ajaxRequest = null;
    }

    if (!phoneNumberPattern.test(phoneNumber)) {
      $listData.empty().removeClass("active"); // hide if input becomes invalid
      return;
    }

    $debounceTimer = setTimeout(function () {
      $ajaxRequest = $.ajax({
        url: `${$domain}/admin/api/get-address/?search=${phoneNumber}`,
        type: "GET",
        dataType: "json",
        beforeSend: function () {
          $listData.html("<p>Data loading...</p>").addClass("active");
        },
        success: function (response) {
          const data = response.data ? response.data : response;

          // FIX: was `if (data > 0)` — array compared to number is always false
          if (Array.isArray(data) && data.length > 0) {
            userList(data);
          } else {
            userList([]);
          }
        },
        error: function (xhr) {
          if (xhr.statusText === "abort") return; // silently ignore aborted requests
          console.error("Error:", xhr.responseText);
        },
      });
    }, 400); // wait 400ms after user stops typing
  });

  function escapeHtml(str) {
    if (!str) return "";
    return String(str)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#39;");
  }

  function userList(data) {
    $listData.empty();

    if (data.length > 0) {
      let $html = `<h2><span>Address Suggestions</span><span id="ndev-close">Close</span></h2>`;
      data.forEach(function (e) {
        $html += `<li class="ndev-address-list-item" data-address="${escapeHtml(
          e["customer_address"]
        )}">`;
        $html += `<h4>Name: ${escapeHtml(e["customer_name"])}</h4>`;
        $html += `<span>Address: ${escapeHtml(
          e["customer_address"]
        )}</span><br>`;
        $html += `</li>`;
      });
      $listData.html($html).addClass("active");
      customerAddressFillup();
    } else {
      // FIX: was missing removeClass("active") so the dropdown stayed open
      $listData
        .html(`<li>No address found for this number.</li>`)
        .removeClass("active");
    }
  }

  // FIX: close button handler was missing entirely
  // $(document).on("click", "#ndev-close", function () {
  //   $listData.empty().removeClass("active");
  // });

  function customerAddressFillup() {
    $(document).on("click", ".ndev-address-list-item", function () {
      const address = $(this).data("address");

      $customeraddress.val(address);

      $listData.removeClass("active");
      $listData.empty();
    });

    $(document).on("click", "#ndev-close", function () {
      $listData.removeClass("active");
      $listData.empty();
    });
  }

  // product length changer
  $product_length = $(".ndev_producuct_length");
  let $product_data = $("#ndev-table-data");
  let $order_search = $("#ndev-order-search");

  $product_length.on("change", function () {
    let value = $(this).val();
    let endpoints = `?search=0&per_page=${value}&page=${1}`;
    if (orderStateFilter !== undefined) {
      endpoints += `&state=${encodeURIComponent(orderStateFilter)}`;
    }

    orderListHandler($orders_filter_api, endpoints, function (html, totalpage) {
      $product_data.html(html);
      genaratePagination($orders_filter_api, value, totalpage);
    });
  });

  let typingTimer;
  const doneTypingDelay = 500; // ms — adjust to taste

  $order_search.on("input", function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(() => {
      let value = $(this).val();
      let search_value = `?search=${value}&per_page=${$product_length.val()}&page=${1}`;
      orderListHandler(
        $order_search_api,
        search_value,
        function (html, totalpage) {
          $product_data.html(html);
          genaratePagination($order_search_api, value, totalpage);
        }
      );
      // trigger your search/AJAX here
    }, doneTypingDelay);
  });

  /**
   * Pagination
   */
  function genaratePagination($api, $value, $totalpage) {
    $totalpage = Number($totalpage) || 1;

    let $paginationContainer = $("#ndev-pagination");
    $paginationContainer.empty();

    let currentPage = 1;

    function buildEndpoint(page) {
      let per_page = $product_length.val();
      let endpoint = `?search=${$value}&per_page=${per_page}&page=${page}`;
      if (orderStateFilter !== undefined) {
        endpoint += `&state=${encodeURIComponent(orderStateFilter)}`;
      }
      return endpoint;
    }

    // Returns an array like [1, "...", 8, 9, 10, 11, 12, "...", 3000]
    function getPaginationRange(current, total, delta = 2) {
      let range = [1, total];
      for (let i = current - delta; i <= current + delta; i++) {
        if (i > 1 && i < total) range.push(i);
      }
      range = [...new Set(range)].sort((a, b) => a - b);

      let withDots = [];
      let last = 0;
      range.forEach(function (page) {
        if (last) {
          if (page - last === 2) {
            withDots.push(last + 1); // fill single gap instead of "..."
          } else if (page - last > 2) {
            withDots.push("...");
          }
        }
        withDots.push(page);
        last = page;
      });

      return withDots;
    }

    function renderPageNumbers(current) {
      let $numbers = $paginationContainer.find(".ndev-pagination-numbers");
      $numbers.empty();

      getPaginationRange(current, $totalpage, 2).forEach(function (page) {
        if (page === "...") {
          $numbers.append(`<span class="ndev-pagination-dots">...</span>`);
        } else {
          let activeClass = page === current ? "active current" : "";
          $numbers.append(
            `<span class="ndev-pagination-item paginate_button ${activeClass}" data-index="${page}">${page}</span>`
          );
        }
      });
    }

    function renderState(page) {
      renderPageNumbers(page);

      $paginationContainer
        .find(".ndev-pagination-item-prev")
        .toggleClass("disabled", page === 1);

      $paginationContainer
        .find(".ndev-pagination-item-next")
        .toggleClass("disabled", page === $totalpage);

      $paginationContainer.attr("data-target", page);
    }

    function goToPage(page) {
      // page = Math.min(Math.max(page, 1), $totalpage);
      renderState(page);
      orderListHandler($api, buildEndpoint(page), function (html) {
        $product_data.html(html);
      });
    }

    // Static structure: Prev | numbers wrapper | Next
    $paginationContainer.append(
      `<span class="ndev-pagination-item-prev paginate_button  disabled" data-index="1">Previous</span>`
    );
    $paginationContainer.append(
      `<span class="ndev-pagination-numbers "></span>`
    );
    $paginationContainer.append(
      `<span class="ndev-pagination-item-next paginate_button " data-index="2">Next</span>`
    );

    // Initial load
    orderListHandler($api, buildEndpoint(currentPage), function (html) {
      $product_data.html(html);
    });
    renderState(currentPage);

    // Prev
    $paginationContainer.on("click", ".ndev-pagination-item-prev", function () {
      if ($(this).hasClass("disabled")) return;
      let current =
        Number($paginationContainer.attr("data-target")) || currentPage;
      goToPage(current - 1);
    });

    // Next
    $paginationContainer.on("click", ".ndev-pagination-item-next", function () {
      if ($(this).hasClass("disabled")) return;
      let current =
        Number($paginationContainer.attr("data-target")) || currentPage;

      goToPage(current + 1);
    });

    // Page number click
    $paginationContainer.on("click", ".ndev-pagination-item", function () {
      let current =
        Number($paginationContainer.attr("data-target")) || currentPage;
      let currentIndex = Number($(this).attr("data-index"));

      if (current === currentIndex) {
        console.log("Now you are in current page!");
        return;
      }
      goToPage(Number($(this).data("index")));
    });
  }

  /**
   *
   * @param {*} $api
   * @param {*} $endpoints
   * @param {*} callback
   */

  /**
   * Pre call api
   */
  let initialOrdersEndpoint = "?search=0";
  if (orderStateFilter !== undefined) {
    initialOrdersEndpoint += `&state=${encodeURIComponent(orderStateFilter)}`;
  }
  orderListHandler(
    $orders_filter_api,
    initialOrdersEndpoint,
    function (html, totalpage) {
      // console.log("Total page: ", totalpage);
      genaratePagination($orders_filter_api, 0, totalpage);
    }
  );

  // console.log($("#ndev-pagination"));

  function orderListHandler($api, $endpoints, callback) {
    $.ajax({
      url: `${$api}${$endpoints}`,
      type: "GET",
      dataType: "json",
      beforeSend: function (xhr, settings) {
        $("#ndev-spiner").show();
      },
      success: function (response) {
        console.log(response, response.data);
        const data = response.data ? response.data : response;
        if (typeof data !== "boolean") {
          $("#ndev-spiner").hide();
        }
        let $html = "";

        $.each(data, function (i, e) {
          let order_state_color =
            e.order_state_info && e.order_state_info.state_color
              ? e.order_state_info.state_color
              : "";
          let order_state_name =
            e.order_state_info && e.order_state_info.orderstatename
              ? e.order_state_info.orderstatename
              : "";
          let area_name =
            e.area_info && e.area_info.area_name ? e.area_info.area_name : "";

          $html += `<tr>`;
          $html += `<td><a href="${$domain}/client/dashboard/order_details/${e.track_number}">${e.track_number}</a></td>`;
          $html += `<td><span style="background:${order_state_color};border-radius:3px;color:white;padding:3px">${order_state_name}</span></td>`;
          $html += `<td>${e.customer_name}</td>`;
          $html += `<td>${e.customer_mobile ?? ""}</td>`;
          $html += `<td>${e.customer_address ?? ""}</td>`;
          $html += `<td>${area_name}</td>`;
          $html += `<td>${e.delivery_time ?? ""}</td>`;
          $html += `<td>${e.seller_name ?? ""}</td>`;
          $html += `<td>${e.reference_invoice ?? ""}</td>`;
          $html += `<td>${e.created_at ?? ""}</td>`;
          $html += `</tr>`;
        });
        // console.log("Total page 2: ", response.totalpage);

        callback($html, response.totalpage);
      },
      error: function (err) {
        console.log(err);

        callback(
          `<p style='padding: 10px; background: #ff0000; border-radius: 10px; color: #fff; margin-top: 10px;'>Server error</p>`,
          0
        );
      },
    });
  }
});
