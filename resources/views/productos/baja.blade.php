 <form action="{{asset('productos/'.$product->id)}}" method="post" class="form-inline" style="display: inline-block;">
 	@csrf
 	{{method_field('delete')}}
 	<button type="submit" class="btn btn-danger btn-sm">Dar de baja</button>
 </form>