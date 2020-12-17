<form action="localstorage_Product.php" method="post" enctype="multipart/form-data">
    <tr>
        <td style="padding-left:16px">Product name</td> <td>
            <input name="product-name" value="product-name" id="inputname"/> </td> 
    </tr> 
    <tr>
        <td style="padding-left:16px">Original Price</td> <td>
            <input type="text" name="original-Price" value="original-price" id="inputprice" /> 
        </td>
    </tr> <br> <tr>
        <td></td> 
        <td>
            <input type="submit" value="Save" onclick="saveMy()"/> 
            <input type="submit" value="remove" onclick="removeMy()"/></input> 
        </td>
    </tr> 
</form>
<script>
    function saveMy() {
        var getProduct=[
        {
        localproductName: document.getElementById("inputname").value,
        localPrice: document.getElementById("inputprice").value,
        }];
        localStorage. setItem('productList',JSON.stringify(getProduct));
    }
    function removeMy() {
        document.getElementById('inputname').value ='';
        localStorage.removeItem('localproductName');

        document.getElementById('inputprice').value ='';
        localStorage. removeItem('localPrice');
        localStorage.clear();
    }
</script>
