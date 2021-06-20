                 <div class="col-4 card m-2 items-div pt-1">
                     <div class="row" id="section_items">
                         <div class="btn-group me-2 m-1">
                             <div class="input-icons">
                                 <div class="input-group">
                                     <div class="input-group-prepend border-right-0">
                                         <div class="input-group-text bg-white  text-muted" id="btnGroupAddon"><svg
                                                 xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                 <circle cx="11" cy="11" r="8"></circle>
                                                 <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                             </svg></div>
                                     </div><input type="text" class="form-control border-left-0"
                                         placeholder="Item Search " id="search_input_sale_item"
                                         onkeyup="select_data_sale_item();" size="50" height="10">
                                 </div>
                             </div>
                         </div>
                         <span style="color:red; margin-left:20%; display:none; margin-top:30%;"
                             id="no_data_item_select"> No matching
                             item found
                             !</span>





                         <table width="100%" id="total_items_sales">
                             <div id="scroll">
                                 <?php
                       

 
                     $count =0;
                       while($row_ = $result_->fetch_assoc()) { 
                            
                        $count++;
                           ?>
                                 <tr class="mb-2 search-tr-item pointer" width="100%"
                                     onClick="addItem(<?php echo $row_['id']; ?>,'<?php echo $row_['name']; ?>',
                                     <?php echo $row_['tax']; ?>,<?php echo $row_['price']; ?>,<?php echo $row_['qnty']; ?>,'<?php echo $ROOT_URI ;?>img/item.png');">
                                     <td width="20% "><img src="<?php echo $ROOT_URI ;?>img/item.png"
                                             class="img-rounded" height="50"></td>
                                     <td width="30% " class="search-word-item-sale">
                                         <?php echo strtoupper($row_['name']); ?>

                                         <div class="font-10"><?php echo $row_['tax']; ?> % [ Tax ]</div>
                                     </td>

                                     <td width="50% ">
                                         <table class="font-10">

                                             <tr>
                                                 <td> <i class="fa fa-inr"></i> : <span
                                                         class="font-10 item-list-price"><?php echo $row_['price']; ?></span>
                                                 </td>

                                             </tr>
                                             <tr>
                                                 <td> <i class="fa fa-cube"></i> : <span
                                                         class="font-10 item-list-qnt"><?php echo $row_['qnty']; ?></span>
                                                 </td>
                                             </tr>

                                             <tr>


                                             </tr>





                                         </table>
                                     </td>

                                 </tr>


                                 <?php  } ?>

                             </div>

                         </table>

                     </div>
                 </div>