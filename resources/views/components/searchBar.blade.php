
<div class="container extra-padding-container py-5 ">
    <div class="row ">
        <div class="col-md-3">
                <div class="  ">
                    <label  class="form-label searchbar-label">Search</label>
                   <form action="{{ route('search') }}" method="POST">
                    @csrf
                     
                    <input type="text" class="form-control" id="searchAnimeTitle" name="searchAnimeTitle"  placeholder="Search By Title">
                    
                   </form>
                </div>
                                
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
        </div>
    </div>
</div>

