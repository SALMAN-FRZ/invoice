<div style="display:none;" id="print_" class="m-5">

    <div class="m-4">
        <button class="btn btn-warning" onclick="closePrint();">Close</button>

    </div>
    <table class="table" id="table_print">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Discount Amount</th>
                <th scope="col">Tax</th>
                <th scope="col">Total</th>



            </tr>
        </thead>
        <tbody>



        </tbody>
        <tfoot>
            <tr>
                <td colspan=7>Total</td>
                <td id="total_amount_print"> </td>
            </tr>
        </tfoot>
    </table>

</div>

<table style="display:none;">
    <tr class="template-row-print">
        <th scope="row" class="index">1</th>
        <td class="item_name"> </td>
        <td class="price"> </td>
        <td class="quantity"> </td>
        <td class="sub_total"> </td>
        <td class="discount"> </td>
        <td class="tax"> </td>
        <td class="total"> </td>
    </tr>

</table>