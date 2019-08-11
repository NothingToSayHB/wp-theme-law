<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="input-group">
            <form id="searchform" class="law-search-form" action="<?php echo home_url('/')?>">
                <div class="input-group">
                    <input type="text" value="<?php get_search_query();?>" class="form-control" placeholder="search" aria-describedby="basic-addon2" name="s" id="s">
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="icon-search"></span>
                    </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>