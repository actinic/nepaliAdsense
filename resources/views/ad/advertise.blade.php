@extends('templates.default')

@section('content')
	@include('templates.alerts')
    @if(!Auth::check())
    	<?php 
    		redirect()->route('auth.proceed');
    	 ?>
	@endif

<!-- <br>
<br>
<br>
<br>
<br>
<hr> -->
	<div class="row" style="margin-top: 110px;">
		<div class="col col-lg-6">
			<fieldset>
				<!-- Form Name -->
				<legend>Your ad list!</legend>
				  <table class="table table-striped">
				    <thead>
				      <tr>
				        <th>S.N</th>
				        <th>No of Views</th>
				        <th>No of Clicks</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody class="list-group">
				    <?php $i=0; ?>
				    @foreach($details as $detail)
				    <?php $i++; ?>
				      <tr>
				        <td>{{$i}}</td>
				        <td><div class="badge badge-default badge-pill">{{$detail->vCount ? : 0}}</div></td>
				        <td><div class="badge badge-default badge-pill">{{$detail->cCount ?: 0}}</div></td>
				        <td><a href="#" title="" class="glyphicon glyphicon-remove"></a></td>
				      </tr>
				    @endforeach
				    </tbody>
				  </table>
				</fieldset>

			</div>

			<div class="col col-lg-6">

			<form class="well form-horizontal" action="#" method="post"  id="contact_form" enctype="multipart/form-data">
				<fieldset>

					<!-- Form Name -->
					<legend>See your ad get published!</legend>
					<div class="image-upload">
					<h3>Upload your banner</h3>
					 <div class="fileinput fileinput-new" data-provides="fileinput">
					  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 150px;"></div>
					  <div>
					    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image" required></span>
					    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					  </div>
					</div>
					</div>

					<!-- Text input-->
					<!-- <div class="form-group{{$errors->has('adname') ? ' has-error' : '' }}">
  						<label class="col-md-4 control-label">Ad name</label>  
	 					<div class="col-md-6 inputGroupContainer">
	 						<div class="input-group">
		  						<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
  								<input name="adname" placeholder="my ad" class="form-control" type="text">
							</div>
						</div><br/><br/>
					@if ($errors->has('adname'))
               		 <span class="help-block text-center">{{$errors->first('adname')}}</span>
           		   @endif
					</div> -->

					<!-- Select Basic -->
					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}"> 
  						<label class="col-md-4 control-label">Category</label>
	 					<div class="col-md-6 selectContainer">
	 						<div class="input-group">
		  					<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="category" class="form-control selectpicker" >
								<option value="" >Please select your advertisement category</option>
								<option>Educational</option>
								<option>Entertainment</option>
								<option>Sports</option>
	 						</select>
  							</div>
						</div><br/><br/>
					   @if ($errors->has('category'))
	               		 <span class="help-block text-center">{{$errors->first('category')}}</span>
	           		   @endif
					</div>

					<!-- Text input-->
					<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
  						<label class="col-md-4 control-label">Redirect link</label>  
						<div class="col-md-6 inputGroupContainer">
							<div class="input-group">
		  					<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  							<input name="link" placeholder="Website or domain name" class="form-control" type="url">
	 						</div>
  						</div><br/><br/>
  						@if ($errors->has('link'))
	               		 <span class="help-block text-center">{{$errors->first('link')}}</span>
	           		   @endif
					</div>

					<!-- Text area -->
					<!-- <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						<label class="col-md-4 control-label">Ad Description</label>
						<div class="col-md-6 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
								<textarea class="form-control" name="description" placeholder="Project Description"></textarea>
							</div>
						</div><br/><br/><br/>
						@if ($errors->has('description'))
	               		 <span class="help-block text-center">{{$errors->first('description')}}</span>
	           		   @endif
					</div> -->

						@if($message!="")
						<div class="alert alert-success">{{$message}}</div>
						@endif
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-warning" >Submit my ad<span class="glyphicon glyphicon-send"></span></button>
						</div>
					</div>
				</fieldset>
				<input type="hidden" name="_token" value="{{Session::token()}}">
			</form>
		</div>
	</div>

@stop