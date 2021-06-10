
@if(count($products)<=0)

    <div class='card'>
        <div class='card-body p-0'>
            <table  class='table table-sm table-hover mb-0'>                  
                <tr><th>No Result Found... </th></tr>                
            </table>
        </div>
    </div>
@else
    <table class="tt-table-02">
        <tbody>
        @foreach($products as $p)

            <tr>
                <td style="padding: 0.8em 0em;"><a href="{{url('/product/'.$p->slug)}}" class='carsearch'>{{$p->name}}</a></td>
            </tr>
                
        @endforeach
        </tbody>
    </table>
@endif
