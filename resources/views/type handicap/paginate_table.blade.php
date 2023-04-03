
            @foreach ($data as $value )

            <tr>
                <td>{{$value->id}}dd </td>
                <td>{{$value->nom}} </td>
                <td>{{$value->description}} </td>
            </tr>
            @endforeach


            <div  style="display:none">






                <!--start-pagination--->
                {{ $data->links() }}
                <!--end-pagination--->
                </div>

