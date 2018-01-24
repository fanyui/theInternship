<div>
<div class="col-sm-3 col-xs-12 col-p-5 listing-images-item">
			<div>
				<div><label> Company Logo</label><i class="del-listing-image pull-right fa fa-times text text-danger"></i></div>
				<img class="img-responsive" src="{{ asset('img/upload.png') }}">
				<input type="file" class="form-control add-new-listing-image" name="logo">
			</div>
</div>
</div>
<br><br><br><br><hr>

<div class="row listing-images">
	<div class="them inline-block">
		<div class="col-sm-3 col-xs-12 col-p-5 listing-images-item">
			<div>
				<label>Image *</label>
				<img class="img-responsive" src="{{ asset('img/upload.png') }}">
				<input type="file" class="form-control add-new-listing-image" name="images[]" required>
			</div>
		</div>
		@foreach(range(1,3) as $img)
		<div class="col-sm-3 col-xs-12 col-p-5 listing-images-item">
			<div>
				<div><label>Image</label><i class="del-listing-image pull-right fa fa-times text text-danger"></i></div>
				<img class="img-responsive" src="{{ asset('img/upload.png') }}">
				<input type="file" class="form-control add-new-listing-image" name="images[]">
			</div>
		</div>
		@endforeach
	</div>
	<div class="inline-block plus" align="center">
		<div class="col-md-3 col-sm-6 col-xs-12" id="add-listing-image">
			<span><i class="fa fa-plus fa-4x"></i></span>
		</div>
	</div>
</div>
<div class="form-group">
    <div class="col-md-3 pull-left">
        <a  class="btn btn-warning col-md-12 nav-btn-next-prev" data-move="prev" data-current="image"  data-next-prev="aminity">
            <i class="fa fa-btn fa-backward"></i>Previous
        </a>
    </div>
    <div class="col-md-6 col-sm-offset-3 pull-right">
        <button type="submit" class="btn submit-listing-btn btn-primary col-md-12">
            <i class="fa fa-btn fa-plane"></i>Submit
        </button>
    </div>
</div>