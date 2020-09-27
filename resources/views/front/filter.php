<div class="panel panel-default">
              <div class="panel-body">
                  <form class="form-inline" role="form">
                      <div class="form-group">
                          <label class="filter-col" style="margin-right:0;" for="pref-perpage">Category:</label>
                          <select id="pref-perpage" class="form-control filter-select" name="formal" onchange="javascript:handleSelect(this)">
                              <?php foreach ($publish_catagory as $p_category) { ?>
                              <option value="<?php echo $p_category->category_id; ?>"><?php echo $p_category->category_name ;  ?></option>
                              <?php } ?>
                          </select>
                      </div>    
                      <script type="text/javascript">
                      function handleSelect(elm)
                      {
                      window.location = '<?php echo base_url(); ?>movie/CategoryMovie/'+elm.value;
                      }
                      </script>
                      <div class="form-group">
                          <label class="filter-col" style="margin-right:0;" for="pref-orderby">Year:</label>
                          <select id="pref-orderby" class="form-control filter-select">

                              <option value="1990">1990</option>
                              <option value="1990">1990</option>
                              <option value="1990">1990</option>
                              <option value="1990">1990</option>
                              <option value="1990">1990</option>
                              <option value="1990">1990</option>
                          </select>                                
                      </div> 
                      <div class="form-group">
                          <label class="filter-col" style="margin-right:0;" for="pref-orderby">Genre:</label>
                          <select id="pref-orderby" class="form-control filter-select" >
                              <option>Descendent</option>
                          </select>                                
                      </div> 
                      <div class="form-group">
                          <label class="filter-col" style="margin-right:0;" for="pref-orderby">Alphabet:</label>
                          <select id="pref-orderby" class="form-control filter-select" >
                              <option>Descendent</option>
                          </select>                                
                      </div> 
                  </form>
              </div>
          </div>