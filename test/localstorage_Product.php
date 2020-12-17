<body> 
    <div id="product-list"> 
</body> 
<script>
    document.getElementById('product-list').innerHTML;
    var getData = JSON.parse(localStorage.getItem('productList'));
    var getList = '';
    for(i=0;i<getData. length; i++){
        getList += '<p>Productname: '+getData[i]. localproductName+ '</p><p>Price:'+getData[i].localPrice+'</p>'
    }
    document.getElementById('product-list').innerHTML = getList ;
    
</script>
