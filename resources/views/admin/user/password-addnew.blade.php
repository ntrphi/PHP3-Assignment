    <div class="row">
    
        <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @if ($errors)
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>
        </div>
    </div>
