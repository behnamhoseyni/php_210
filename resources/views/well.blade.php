<ul>
@foreach($Product as $Produc)
<li>
                   {{ $Produc->manu_factures }}
</li>                   
      @endforeach()
</ul>      