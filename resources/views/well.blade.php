<ul>
<<<<<<< HEAD
@foreach($product_details as $Produc)
<li>
                   {{ $Produc->product_name }}
=======
@foreach($Product as $Produc)
<li>
                   {{ $Produc->manu_factures }}
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
</li>                   
      @endforeach()
</ul>      