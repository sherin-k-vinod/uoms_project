   @extends('admin.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Required size</h1>

      </div>
      <a class="btn btn-primary icon-btn" href="#"><i class="fa fa-plus"></i>Add Varient </a>
        </div>
      @foreach($variantcolours as $variantcolour)
          <div class="row" > 
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="{{route('admin.materials.varient.save')}}" method="post" class="form-horizontal">
                @csrf
                <input type="hidden" name="varient_id" value="{{$variantcolour->varient_id}}">
                <input type="hidden" name="material_id" value="{{$variantcolour->material_id}}">
                 <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th><label>{{$variantcolour->varients->colour}}</label></th>
                      @if($variantcolour->required_size > 0)
                        <th><input type="text" name="variantSize" placeholder="Required size" class="form-control"   value="{{$variantcolour->required_size}}"></th>
                        <th><input type="submit" value="UPDATE" class="btn btn-primary" >
                        </th>

                      @else
                        <th><input type="text" name="variantSize" placeholder="Required size" class="form-control"></th>
                        <th><input type="submit" value="SAVE" class="btn btn-primary" ></th>
                      @endif
                    </tr>
                  </thead>
                 </tbody>
                </table>
                </form>
                <a href="{{route('admin.materials.varient.delete', $variantcolour->material_product_id)}}"><button class=" btn btn-danger" disabled="">DELETE</button></a>
             </div>
          </div>
        </div>
      </div>
       @endforeach
       @endsection