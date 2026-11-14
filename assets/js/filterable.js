$(document).ready(function(){
    loadFilter();
    if($('.filterable tr:visible').length>0) calculateData();
});

function loadFilter(){

    $(document).on('click','.filterable .btn-filter',function(){
        
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $(document).on('keyup','.filterable .filters input',function(e){

        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }

        calculateData();
    });
}

function calculateData(){

    var values=[0,0,0,0,0,0,0];

    $('.filterable table tbody tr:visible').each(function(index,item){
        $(item).find('td.calculatable').each(function(index, item){
            values[index] += parseFloat($(item).text());
        });
    });

    $('.filterable table tfoot td.calculatable').each(function(index,item){
        $(item).text(Math.ceil(values[index]));
    });
}