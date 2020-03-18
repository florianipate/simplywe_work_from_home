                <div class="row">
                    <div class="col">
                        <p class="font-18"><b>SEARCH BY COUNTY</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <select class="form-control" id="county" disabled>
                            <option value="" <?php if ($_SESSION["county"] == "") {echo "selected";} ?>>All Counties</option>
                            <option value="Essex" <?php if ($_SESSION["county"] == "Essex") {echo "selected";} ?>>Essex</option>
                        </select>
                    </div>
                    <div class="col-md form-group">
                        <input type="number" min="0" class="form-control" id="daytime_guests" placeholder="Daytime Guests" value="<?php echo $_SESSION["daytime_guests"]; ?>" disabled>
                    </div>
                    <div class="col-md form-group">
                        <input type="number" min="0" class="form-control" id="evening_guests" placeholder="Evening Guests" value="<?php echo $_SESSION["evening_guests"]; ?>" disabled>
                    </div>
                    <div class="col-md form-group">
                        <select class="form-control" id="sort_order" disabled>
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