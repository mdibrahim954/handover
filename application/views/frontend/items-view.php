

<style>
  :root{
    --bg:#eef1f5; --card:#ffffff; --ink:#14213d; --muted:#6b7686; --line:#e3e8ef;
    --chip:#f3f5f9; --ok:#0f8a5f; --ok-bg:#e3f6ee; --out:#c62f3b; --out-bg:#fdeaec;
    --radius:20px;
  }
  *{box-sizing:border-box;margin:0}
  body{
    font-family:'Figtree',system-ui,sans-serif;background:var(--bg);color:var(--ink);
    min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;
  }
  .card{
    width:100%;max-width:440px;background:var(--card);border-radius:var(--radius);
    box-shadow:0 1px 2px rgba(20,33,61,.06),0 12px 32px rgba(20,33,61,.08);overflow:hidden;
  }
  .head{padding:24px 24px 18px;display:flex;justify-content:space-between;align-items:flex-start;gap:14px}
  .title{font-size:1.5rem;font-weight:700;line-height:1.2;letter-spacing:-.01em}
  .badge{
    flex:none;display:inline-flex;align-items:center;gap:7px;padding:7px 12px;border-radius:999px;
    font-size:.82rem;font-weight:600;white-space:nowrap;
  }
  .badge::before{content:"";width:8px;height:8px;border-radius:50%;background:currentColor}
  .badge.in{color:var(--ok);background:var(--ok-bg)}
  .badge.out{color:var(--out);background:var(--out-bg)}
  .rows{border-top:1px solid var(--line)}
  .row{display:flex;justify-content:space-between;align-items:center;gap:16px;padding:15px 24px;border-bottom:1px solid var(--line)}
  .row:last-child{border-bottom:0}
  .label{color:var(--muted);font-size:.92rem}
  .value{font-weight:600;text-align:right;word-break:break-all}
  .code{font-variant-numeric:tabular-nums;background:var(--chip);padding:4px 10px;border-radius:8px;font-size:.92rem}
  .qty{font-size:1.15rem}
  .qty.zero{color:var(--out)}
  .foot{padding:18px 24px 24px}
  .btn{
    width:100%;padding:14px;border:0;border-radius:12px;font:inherit;font-weight:600;font-size:1rem;text-align:center;
    background:var(--ink);color:#fff;
  }
  .btn.in{background:var(--ok)}
  .btn.out{background:var(--out)}

  @media (min-width:900px){
    .card{max-width:560px}
    .head{padding:32px 32px 22px}
    .title{font-size:1.9rem}
    .row{padding:18px 32px}
    .foot{padding:22px 32px 32px}
  }
  @media (max-width:360px){
    .head{flex-direction:column}
  }
</style>


<?php
$product = isset($product) ? $product : NULL;
$inventoryLog = isset($inventory_log) ? $inventory_log : NULL;
$serial = isset($serial) ? (string) $serial : '';
$order = isset($order) ? $order : NULL;
$orderRequested = !empty($order_requested);

if ($orderRequested) {
    if (empty($order)) {
        ?>
        <article class="card" id="product">
            <div class="head">
                <h1 class="title">Order not found</h1>
                <span class="badge out" id="status">Not found</span>
            </div>
            <div class="rows">
                <div class="row"><span class="label">Order ID</span><span class="value code">--</span></div>
            </div>
        </article>
        <?php
    } else {
        ?>
        <article class="card" id="product">
            <div class="head">
                <h1 class="title">Order #<?php echo html_escape((string) $order->order_id); ?></h1>
            </div>
            <div class="rows">
                <div class="row"><span class="label">Track Number</span><span class="value code"><?php echo html_escape((string) $order->track_number); ?></span></div>
                <div class="row"><span class="label">Seller Name</span><span class="value"><?php echo html_escape((string) $order->seller_name); ?></span></div>
                <div class="row"><span class="label">Customer Name</span><span class="value"><?php echo html_escape((string) $order->customer_name); ?></span></div>
            </div>
        </article>
        <?php
    }
} elseif (empty($product)) {
    ?>
    <article class="card" id="product">
        <div class="head">
            <h1 class="title">Product not found</h1>
            <span class="badge out" id="status">Not found</span>
        </div>
        <div class="rows">
            <div class="row"><span class="label">Item Code</span><span class="value code">--</span></div>
            <div class="row"><span class="label">Category</span><span class="value">--</span></div>
            <div class="row"><span class="label">Available Qty</span><span class="value qty">--</span></div>
        </div>
    </article>
    <?php
} else {
    $quantity = max(0, (int) $product->qty);
    $serialNotFound = $serial !== '' && empty($inventoryLog);
    $isSold = !$serialNotFound && !empty($inventoryLog) && (int) $inventoryLog->sold === 1;
    $isOutOfStock = !$serialNotFound && !$isSold && $quantity === 0;

    if ($serialNotFound) {
        $status = 'Serial not found';
        $statusClass = 'out';
    } elseif ($isSold) {
        $status = 'Sold out';
        $statusClass = 'out';
    } elseif ($isOutOfStock) {
        $status = 'Out of stock';
        $statusClass = 'out';
    } else {
        $status = 'Available';
        $statusClass = 'in';
    }
    ?>
    <article class="card" id="product">
        <div class="head">
            <h1 class="title"><?php echo html_escape((string) $product->name); ?></h1>
            <span class="badge <?php echo $statusClass; ?>" id="status"><?php echo html_escape($status); ?></span>
        </div>
        <div class="rows">
            <div class="row"><span class="label">Item Code</span><span class="value code"><?php echo html_escape((string) $product->item_code); ?></span></div>
            <?php if ($serial !== '') { ?>
                <div class="row"><span class="label">Serial</span><span class="value code"><?php echo html_escape($serial); ?></span></div>
            <?php } ?>
            <div class="row"><span class="label">Category</span><span class="value"><?php echo html_escape((string) ($product->category ? $product->category : 'Uncategorized')); ?></span></div>
            <div class="row"><span class="label">Available Qty</span><span class="value qty<?php echo $quantity === 0 ? ' zero' : ''; ?>"><?php echo $quantity; ?></span></div>
        </div>
        <div class="foot">
            <div class="btn <?php echo $statusClass; ?>" role="status"><?php echo html_escape($status); ?></div>
        </div>
    </article>
    <?php
}
?>
