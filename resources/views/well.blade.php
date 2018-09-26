<ul>
@foreach($product_details as $Produc)
<li>
                   {{ $Produc->product_name }}
</li>                   
      @endforeach()
</ul>      