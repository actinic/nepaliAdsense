@extends('templates.default')
@section('content')
	<section class="content" style="min-height: 575px;background: url('{{URL::asset("assets/img/background.jpg")}}');"> 
		<div class="row">
			<div class="col-md-5 col-sm-6 col-md-offset-1" style="color:#FFFFFF">
				 <h2  class="text-center">Your apps</h2><hr/>
				 <table class="table table-striped">
				    <thead>
				      <tr>
				        <th>APP ID</th>
				        <th>Category</th>
				        <th>Earned</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody class="list-group">
				    @foreach($devdetails as $detail)
				      <tr>
				        <td><div class="badge badge-default badge-pill">{{$detail->appId}}</div></td>
				        <td><div class="badge badge-default badge-pill">{{$detail->category}}</div></td>
				        <td><div class="badge badge-default badge-pill">Nrs. 1025</div></td>
				        <td><a href="#" title="Delete" class="glyphicon glyphicon-remove"></a></td>
				      </tr>
				     @endforeach
				    </tbody>
				  </table>
				
			</div>


				<div class="col-md-4 col-sm-6 col-md-offset-1" style="color:#FFFFFF">
				 <h2  class="text-center">Register new app</h2><hr/>
				 <form method="POST">
				 	<div class="form-group">
				 		<label>Category</label>
				 		<select class="form-control" name="category" required="true">
				 			<option value="">Choose one</option>
				 			<option value="Education">Education</option>
				 			<option value="Entertrainment">Entertrainment</option>
				 			<option value="Music">Music</option>
				 		</select>
				 	</div>
				 	<div class="form-group">
				 		<button class="btn btn-default pull-right">Submit</button>
				 	</div>
				 	<input type="hidden" name="_token" value="{{Session::token()}}">
				 </form>
				</div>
		</div>
	</section>
@stop