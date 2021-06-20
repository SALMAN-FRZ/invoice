// Item search in item list
function select_data_sale_item() {
    var noDataError = 0;
    var input, filter, allData, cards, a, i, txtValue;
    input = document.getElementById('search_input_sale_item');

    filter = input.value.toUpperCase();


    allData = document.getElementById('total_items_sales');

    cards = allData.getElementsByClassName('search-tr-item');

    for (i = 0; i < cards.length; i++) {
        a = cards[i].getElementsByClassName('search-word-item-sale')[0];

        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = '';
        } else {
            cards[i].style.display = 'none';
            noDataError++;
        }


    }

    // Show error if all items is null
    if (noDataError === cards.length) {
        document.getElementById('no_data_item_select').style.display = 'block';
    } else {
        document.getElementById('no_data_item_select').style.display = 'none';
    }


}


// create a global array for add items added
var itemAdeddList = [];


// Function for select item for invoice
function addItem(id, name, tax, price, qnt, img) {


    // pass all data of selected items, in item list as parameter of function
    // and get all data and create a object called itemList

    var itemList = {
        id: id,
        name: name,
        tax: tax,
        price: price,
        qnt: qnt,
        img: img
    }


    // check item id is already exist, if not exist then push data , else not 

    if (itemAdeddList.length != 0) {

        for (var i = 0; i < itemAdeddList.length; i++) {
            if (itemAdeddList[i].id === itemList.id) {
                return;
            }

        }

    }

    // data push to array
    itemAdeddList.push(itemList);



    renderSelectedItem();

}


// Function for render selected data
function renderSelectedItem() {




    // get all previous element in selected table
    var allOldRows = document.getElementById('selected_table').getElementsByClassName('border-bottom');




    // add to items to array
    for (i = 0; i < itemAdeddList.length; i++) {
        $el = $('.template-row-selected').clone();


        // consider default quantity is 1, then
        // find sub total amount

        var subTotalBeforeTax = itemAdeddList[i].price;

        // find tax
        var taxAmount = subTotalBeforeTax * itemAdeddList[i].tax / 100;

        // total include tax
        var totalWithTax = subTotalBeforeTax + taxAmount;


        // set all data into tr
        $el[0].getElementsByClassName('item-selected-list-img')[0].src = itemAdeddList[i].img;
        $el[0].getElementsByClassName('item-selected-list-item-name')[0].innerText = itemAdeddList[i].name;
        $el[0].getElementsByClassName('item-selected-list-item-price')[0].innerText = itemAdeddList[i].price;
        $el[0].getElementsByClassName('item-selected-list-gst')[0].innerText = itemAdeddList[i].tax;
        $el[0].getElementsByClassName('item-selected-list-item-price-bftax')[0].innerText = subTotalBeforeTax;
        $el[0].getElementsByClassName('item-selected-list-gst-price')[0].innerText = taxAmount;
        $el[0].getElementsByClassName('item-selected-list-item-total')[0].innerText = totalWithTax;
        $el[0].getElementsByClassName('item-selected-list-item-qnt')[0].value = 1;
        $el[0].getElementsByClassName('item-selected-list-id')[0].value = itemAdeddList[i].id;


        var status = true;


        // check render data alredy exist, 
        for (j = 0; j < allOldRows.length; j++) {

            var oldDataId = allOldRows[j].getElementsByClassName('item-selected-list-id')[0].value;


            if (oldDataId == itemAdeddList[i].id) {

                status = false;
                // return;

            }

        }



        // if not exist append to table
        if (status === true) {
            $('#selected_table').append($el[0]);

        }



    }


    calculateSumInvoice();

}


// This function for , convert to 2 decimal points and , indian stansted comma seperator 
function numberComas(x) {
    // en-IN  indian format
    formatter = new Intl.NumberFormat('en-IN', {
        // These options are needed to round to whole numbers if that's what you want.
        minimumFractionDigits: 2, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        maximumFractionDigits: 2, // (causes 2500.99 to be printed as $2,501)
    });
    // console.log(typeof x);
    if (typeof x != 'number') {
        var input_ = x.replace(/[^0-9.]/g, '');
    } else {
        input_ = x;
    }

    z = formatter.format(parseFloat(input_));

    return z;
}

// calculate total amount of item selected
function calculateTotalPrice(x) {

    // get parent row of selected item
    const tr = x.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;


    // get price, qnt , tax
    var price = parseInt(tr.getElementsByClassName('item-selected-list-item-price')[0].innerText);
    var qnt = parseInt(tr.getElementsByClassName('item-selected-list-item-qnt')[0].value);
    var discount_perc = parseInt(tr.getElementsByClassName('item-selected-list-item-disc-perc')[0].value);
    var discount_price = parseInt(tr.getElementsByClassName('item-selected-list-item-disc-price')[0].value);
    var gst = parseInt(tr.getElementsByClassName('item-selected-list-gst')[0].innerText);

    // calculate total before tax
    var totalBeforeTax = qnt * price;



    // 1. check if changed value, in discount or quantity
    if (x.getAttribute('class') == 'item-selected-list-item-disc-perc') {
        tr.getElementsByClassName('item-selected-list-item-disc-price')[0].value = 0;

        var discount = totalBeforeTax * discount_perc / 100;

        tr.getElementsByClassName('item-selected-list-item-disc-price')[0].value = discount;
    } else if (x.getAttribute('class') == 'item-selected-list-item-disc-price') {
        tr.getElementsByClassName('item-selected-list-item-disc-perc')[0].value = 0;

        var discount = discount_price;
        tr.getElementsByClassName('item-selected-list-item-disc-perc')[0].value = discount * 100 / totalBeforeTax;
    } else {
        tr.getElementsByClassName('item-selected-list-item-disc-perc')[0].value = 0;
        tr.getElementsByClassName('item-selected-list-item-disc-price')[0].value = 0;
        var discount = 0;
    }


    // reduce discount price
    totalBeforeTax = totalBeforeTax - discount;
    // and set the value
    tr.getElementsByClassName('item-selected-list-item-price-bftax')[0].innerText = totalBeforeTax;



    // tax calculation
    var gstPrice = totalBeforeTax * gst / 100;
    tr.getElementsByClassName('item-selected-list-gst-price')[0].innerText = gstPrice;


    tr.getElementsByClassName('item-selected-list-item-total')[0].innerText = numberComas(totalBeforeTax + gstPrice);


    calculateSumInvoice();
}



// Delete on array list
function deleteSelectedItem(val) {
    var r = confirm('Are you confirm to remove this item!');
    if (r == true) {
        // remove on dom
        val.parentNode.parentNode.remove();

        // remove on array
        var batch = val.parentNode.parentNode.getElementsByClassName('item-selected-list-batch')[0];

        var index_ = itemAdeddList.findIndex((element) => (element.batch = batch));

        itemAdeddList.splice(index_, 1);

        calculateSumInvoice();
    } else {}
}

// function to calculate sum of invoice
function calculateSumInvoice() {
    totalSumAmountInvoice = 0;

    // get all tr data
    var tr = document.getElementById('selected_table').getElementsByClassName('border-bottom');

    for (i = 0; i < tr.length; i++) {

        // sum of all selected items
        var sum = tr[i].getElementsByClassName('item-selected-list-item-total')[0].innerHTML;



        totalSumAmountInvoice = totalSumAmountInvoice + parseFloat(sum.replace(/,/g, ''));
    }

    // set value of sum in to form
    document.getElementById('total_amount_invoice').innerHTML = numberComas(totalSumAmountInvoice);

}


// function to print div
function printDiv() {



    // hide element in invoice
    document.getElementById("main_row").style.display = "none";

    // show print div
    document.getElementById("print_").style.display = "block";


    // get all rows of selected
    var allOldRows = document.getElementById('selected_table').getElementsByClassName('border-bottom');

    var totalAmount = 0;

    // loop with each data
    for (i = 0; i < allOldRows.length; i++) {


        // get all data from array
        var itemName = allOldRows[i].getElementsByClassName('item-selected-list-item-name')[0].innerHTML;
        var price = allOldRows[i].getElementsByClassName('item-selected-list-item-price')[0].innerHTML;
        var qnt = allOldRows[i].getElementsByClassName('item-selected-list-item-qnt')[0].value;
        var discount = allOldRows[i].getElementsByClassName('item-selected-list-item-disc-price')[0].value;
        var taxable = allOldRows[i].getElementsByClassName('item-selected-list-item-price-bftax')[0].innerHTML;
        var tax = allOldRows[i].getElementsByClassName('item-selected-list-gst-price')[0].innerHTML;
        var total = allOldRows[i].getElementsByClassName('item-selected-list-item-total')[0].innerHTML;

        totalAmount = totalAmount + parseFloat(total);


        // set all values to print table
        $el = $('.template-row-print').clone();


        $el[0].getElementsByClassName('index')[0].innerText = i + 1;
        $el[0].getElementsByClassName('item_name')[0].innerText = itemName;
        $el[0].getElementsByClassName('price')[0].innerText = price;
        $el[0].getElementsByClassName('quantity')[0].innerText = qnt;
        $el[0].getElementsByClassName('sub_total')[0].innerText = discount;
        $el[0].getElementsByClassName('discount')[0].innerText = taxable;
        $el[0].getElementsByClassName('tax')[0].innerText = tax;
        $el[0].getElementsByClassName('total')[0].innerText = total;

        // append to table
        $('#table_print').append($el[0]);

    }


    //  set total amount print
    document.getElementById('total_amount_print').innerHTML = totalAmount;

}

// close print div
function closePrint() {

    // hide print div
    document.getElementById("print_").style.display = "none";

    // show element in invoice
    document.getElementById("main_row").style.display = "block";



}