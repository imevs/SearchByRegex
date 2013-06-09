<h3>Search</h3>
<form method="POST" id="remote_search">
    <fieldset>
        <div class="input-append">
            <input required type="url" class="span9" name="url" placeholder="Enter url (must begin with http or https)">
            <button type="submit" class="btn">Submit</button>
        </div>
    </fieldset>
    <fieldset>
        <legend>Searched elements type</legend>
        <label class="radio">
            <input type="radio" name="searchType" id="optionsRadios1" value="images" class="choices" checked>
            Images
        </label>
        <label class="radio">
            <input type="radio" name="searchType" id="optionsRadios2" value="links" class="choices">
            Links
        </label>
        <label class="radio">
            <input type="radio" name="searchType" id="optionsRadios3" value="text" class="choices">
            Search by regexp
        </label>
        <textarea name="text_value" id="searched_text" cols="30" rows="5" style="display: none">Марс</textarea>
    </fieldset>
</form>

<div id="results"></div>
