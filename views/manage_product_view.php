<?php
if(count($products)>0) {
    

    $i = 1;
    foreach($products as $product) {
        $typename = $this->productmodel->getType($product->getype_id())->gettype_name();
        $catename = $this->productmodel->getCategory($product->getplace_id())->getplace_name();
        echo    '
    <tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox'.$i.'" name="options[]" value="'.$i.'">
            <label for="checkbox'.$i.'"></label>
        </span>
    </td>
    <td><img src="'.$product->getproduct_thumbnail().'"></td>
    <td>'.$product->getproduct_name().'</td>
    <td>'.$catename.'</td>
    <td>'.$typename.'</td>
    <td>'.$product->getproduct_price().'</td>
    <td>
        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                class="material-icons" data-toggle="tooltip"
                title="Edit">&#xE254;</i></a>
        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                class="material-icons" data-toggle="tooltip"
                title="Delete">&#xE872;</i></a>
    </td>
</tr>
            ';
           $i++;
    }
}