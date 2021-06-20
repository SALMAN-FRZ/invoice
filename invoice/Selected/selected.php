 <div class="col-6 card  m-2" id="total_items_selected">
     <table width="100%" id="selected_table">
         <tbody>

         </tbody>

     </table>



     <!-- Hidden template for render data -->
     <table style="display:none;">
         <tr class="border-bottom template-row-selected">




             <input type="hidden" value class="item-selected-list-id">


             <td width="10%"><img src="" class="img-rounded item-selected-list-img" height="50" alt="Cinque Terre">
             </td>
             <td width="15%"> <span class="font-12 item-selected-list-item-name"></span>


             </td>
             <td width="10%"> <span class="font-12 ">Price</span>

                 <table class="font-10">
                     <tr>
                         <td class="item-selected-list-item-price"> </td>

                     </tr>


                 </table>
             </td>
             <td width="10%"> <span class="font-12 ">Quantity</span>

                 <table class="font-10">
                     <tr>
                         <td>
                             <input type="text" size="4" class="item-selected-list-item-qnt"
                                 onchange="calculateTotalPrice(this);" name="item_qnty[]">
                         </td>


                     </tr>


                 </table>
             </td>
             <td width="10%"> <span class="font-12">Discount</span>

                 <table class="font-10">
                     <tr>
                         <td>% </td>
                         <td> :</td>
                         <td><input type="text" size="4" class="item-selected-list-item-disc-perc"
                                 onchange="calculateTotalPrice(this);" placeholder=" %"
                                 name="item_discount_percentage[]">
                         </td>


                     </tr>
                     <tr>
                         <td>₹ </td>
                         <td>:</td>
                         <td> <input type="text" size="4" class="item-selected-list-item-disc-price"
                                 onchange="calculateTotalPrice(this);" placeholder=" ₹" value=1>
                         </td>

                     </tr>



                 </table>
             </td>
             <td width="10%"> <span class="font-12">Taxable</span>

                 <table class="font-10">
                     <tr>
                         <td class="item-selected-list-item-price-bftax">0.00</td>

                     </tr>


                 </table>
             </td>
             <td width="10%">

                 <table class="font-10">
                     <tr>
                         <td>GST @ <span class="item-selected-list-gst"></span> % &nbsp;
                             <span class="item-selected-list-gst-price">
                             </span>
                         </td>

                     </tr>



                 </table>
             </td>
             <td width="20%" class="text-center"> <span class="font-12">Total</span>
                 <div class="font-12 item-selected-list-item-total"> </div>

             </td>
             <td width="5%">
                 <svg xmlns="http://www.w3.org/2000/svg " width="16" height="16" fill="currentColor"
                     class="bi bi-dash-circle " viewBox="0 0 16 16" color="red" onclick="deleteSelectedItem(this);">
                     <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                     </path>
                     <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"></path>
                 </svg>


             </td>
         </tr>
     </table>
 </div>