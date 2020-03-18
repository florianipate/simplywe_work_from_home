                <div class="row">
                    <div class="col">
                        <p class="font-18"><b>SEARCH FILTERS</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <select class="form-control" id="filter_county">
                            
                            
                            <?php
                            // CREATE OPTION LIST FOR COUNTIES
                            $query = "SELECT DISTINCT county, disabled FROM cms_venue_details ORDER BY county";
                            $get_counties = mysqli_query($connection, $query);
                            echo '<option value="">All Counties</option>';
                            while($row = mysqli_fetch_assoc($get_counties)) {
                                $county = $row['county'];
                                $disabled = $row['disabled'];
                                if ($disabled == 0) {
                                    echo '<option value="'. $county .'" '; if ($_SESSION["county"] == $county) {echo "selected";} echo '>'. $county .'</option>';
                                }
                            }
                            ?>
                            
                            
                        </select>
                    </div>
                    <div class="col-md form-group">
                        <input type="number" min="0" class="form-control" id="filter_daytime" placeholder="Daytime Guests" value="<?php echo $_SESSION["daytime_guests"]; ?>">
                    </div>
                    <div class="col-md form-group">
                        <input type="number" min="0" class="form-control" id="filter_evening" placeholder="Evening Guests" value="<?php echo $_SESSION["evening_guests"]; ?>">
                    </div>
                    <div class="col-md form-group">
                        <select class="form-control" id="filter_sort">
                            <option value="">Sort by</option>
                            <option value="1" <?php if ($_SESSION["sort_order"] == 1) {echo "selected";} ?>>Alphabetical</option>
                            <option value="2" <?php if ($_SESSION["sort_order"] == 2) {echo "selected";} ?>>Price - Low to High</option>
                            <option value="3" <?php if ($_SESSION["sort_order"] == 3) {echo "selected";} ?>>Price - High to Low</option>
                        </select>
                    </div>
                    <div class="col-md form-group">
                        <button type="submit" class="btn btn-purple btn-block" onclick="venueSearch()">Submit</button>
                    </div>
                </div>