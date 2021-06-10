function totalIt() {
    var input = document.getElementsByName("choice");
    var total = 0;
    for (var i = 0; i < input.length; i++) {
        if (input[i].checked) {
            total += parseFloat(input[i].value);
        }
    }
    document.getElementsByName("total")[0].value = "$" + total.toFixed(2);
}


$(document).ready(function () {

    $('.showAreaTable').on('click', function (e) {
        e.preventDefault();
        let tableId = $(this).attr('data-tableid');
        showAreaTable(tableId);
    });

    $('.btnEdit_ajax').on('click', function (e) {
        e.preventDefault();

        let rowId = $(this).attr('data-id')
        let dataUpdate = {};
        $('input.row_edit_id_' + rowId).each(function () {

            let name = $(this).attr('name');
            let val = $(this).val();

            dataUpdate[name] = val;
        });

        $.post('/projects/update/save', dataUpdate);

    });

    function showAreaTable(tableId) {

        $(".card_table").hide();
        $("#card_" + tableId).show();
    }

    $(".ajaxForm").submit(function () {

        let action = $(this).attr('action');
        let form_data = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: action,
            data: form_data,
            success: function () {
                alert('Успешно добавлено!')
            },
            error: function (data) {
                alert("Произошла ошибка!")
            }
        });

        return false;
    });

    $('.addItem').on('click', function (e) {

        let val = $(this).is(':checked');
        let name = $(this).attr('data-name');
        let time = $(this).attr('data-time');
        let itemId = $(this).attr('data-id');
        let price = $(this).val();

        console.log(name + " " +
        time + " " +
        itemId + " " +
        price )
        if (val) {
            addRow(itemId, name, time, price);
        } else {
            $('#resultTable_tr_id_' + itemId).remove()
        }
        getTotal()
    });

    function addRow(id, name, hour, price) {
        let row = '<tr id="resultTable_tr_id_'+id+'"> <td> <i data-id="'+id+'" class="btnRemove icofont icofont-ui-close ico-red"></i> </td> <td>  <p class="m-0">'+name+'</p> </td> <td class="hour_"> '+hour+' </td> <td class="price">'+price+' </td> </tr>';
        console.log(row)
        $('#resultTable tbody').append(row);

    }

    $('body').on('click', '.btnRemove',function (){
        let rowId = $(this).attr('data-id');
        $('#resultTable_tr_id_'+rowId).remove();
        $('.addItem[data-id='+rowId+']').prop( "checked", false );
        getTotal()
    });

    function getTotal(){

        let totalPrice = 0;
        let totalHour  = 0;

        $('#resultTable .price').each(function (index){
            totalPrice = (totalPrice + Number($(this).text()));
        })

        $('#resultTable .hour_').each(function (index){
            totalHour = (totalHour + Number($(this).text()));
        })

        $('.totalHour').text(totalHour);
        $('.totalPrice').text('$'+totalPrice);

    }

    $('.removeCategory').on('click',function (){
        $(this).attr('data-id');
        if (confirm("Вы удаляете категорию и все услуги в данной категории!")){
            // post
        }
    });

});


