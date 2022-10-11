@extends('adminDashboard.master')

@section('adminMainContent')

    <div class="container p-5 mt-4">
        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 class="h1-font-size">Create a Blog Post</h2>
                <hr>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 offset-md-2">
                <form action="">
                    @csrf
                    
                    <div class="row">


                    <div class="col-lg-12 mb-3">
                        <label for="title" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="For Example: 21 Best Anime of All Time: Worth Watching">
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label for="blogDescription" name="blogDescription" class="form-label">Blog Description</label>
                        <textarea class="form-control" id="blogDescription"  rows="6" placeholder="For Example: Here are worth watching top anime... "></textarea>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label for="title" class="form-label">Blog Featured Image</label>
                        <input type="file" class="form-control" id="image" name="image"
                         placeholder="Featured Image">
                    </div>

                    <div class="col-lg-12">
                        <hr>
                    </div>


                    <div class="col-lg-6 mb-3">
                        <label for="metaTitle" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="metaTitle" name="metaTitle" 
                        placeholder="For Example: Worth Watching Best Anime ">
                    </div>

                     
                    <div class="col-lg-6 mb-3">
                        <label for="keywords" class="form-label">Focused Keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Best anime of all time, worth watching anime">
                    </div>

                   
                    <div class="col-lg-12 mb-3">
                        <label for="metaDescription"  class="form-label">Meta Description</label>
                        <textarea class="form-control" id="metaDescription"  name="metaDescription" rows="2"
                         placeholder="Lenght limit: 155-160 characters "></textarea>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label for="postSlug"   class="form-label">Blog Slug</label>
                        <input type="text" class="form-control" id="postSlug" name="postSlug" 
                        placeholder="Best anime of all time, worth watching anime">

                    </div>

                    <div class="col-lg-6 mb-3 ">

                        <label for="" class="form-label">Blog Post Category</label>
                        <select id="" class="form-select" name="postCategory">
                            <option >Please Select Blog Category</option>
                            <option value="review">Anime Review</option>
                            <option value="news">News</option>

                        </select>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="tags" class="form-label">Hash Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" 
                        placeholder="anime, action, romance, adventure">
                    </div>
 
                    <div class="col-lg-6 mb-3 ">

                        <label for="" class="form-label">Blog Post Status</label>
                        <select id="" class="form-select" name="postStatus">
                            <option >Please Select Blog Status</option>
                            <option value="publish">Publish</option>
                            <option value="unpublish">Unpublish</option>

                        </select>
                    </div>

                    <div class="col-lg-6 mb-3 ">

                        <label for="postViews" class="form-label">Blog Post Views</label>
                        <input type="number" class="form-control" id="postViews" name="postViews" 
                        placeholder="Keep it empty for original views">
                    </div>
                    
                    <div class="col-lg-12 mt-5 mb-6">
                        <button type="submit"  class="btn btn-dark">Create Blog Post</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection