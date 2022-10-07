<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Rating</h5>
            </div>
            <div class="modal-body">
                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <div class="card mb-4">
                                <div class="card-header text-dark">Nilai Tulisan</div>
                                <div class="card-body">

                                    <form method="POST" action="/rating/" class="text-center">
                                        @csrf
                                        <span
                                            class="myratings">{{ $ratingUser !== null ? $ratingUser->rating : '0' }}</span>
                                        <h4 class="mt-1 text-dark">Nilai Tulisan</h4>
                                        <input type="hidden" name="movie_id" value="{{ $detail_movie->id }}">

                                        @if ($ratingUser !== null)
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5"
                                                    {{ $ratingUser->rating == 5 ? 'checked' : null }} /><label
                                                    class="full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="rating" value="4.5"
                                                    {{ $ratingUser->rating == 4.5 ? 'checked' : null }} /><label
                                                    class="half" for="star4half"
                                                    title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4"
                                                    {{ $ratingUser->rating == 4 ? 'checked' : null }} /><label
                                                    class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="rating" value="3.5"
                                                    {{ $ratingUser->rating == 3.5 ? 'checked' : null }} /><label
                                                    class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3"
                                                    {{ $ratingUser->rating == 3 ? 'checked' : null }} /><label
                                                    class="full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="rating" value="2.5"
                                                    {{ $ratingUser->rating == 2.5 ? 'checked' : null }} /><label
                                                    class="half" for="star2half"
                                                    title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2"
                                                    {{ $ratingUser->rating == 2 ? 'checked' : null }} /><label
                                                    class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="rating" value="1.5"
                                                    {{ $ratingUser->rating == 1.5 ? 'checked' : null }} /><label
                                                    class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1"
                                                    {{ $ratingUser->rating == 1 ? 'checked' : null }} /><label
                                                    class="full" for="star1"
                                                    title="Sucks big time - 1 star"></label>
                                                <input type="radio" id="starhalf" name="rating" value="0.5"
                                                    {{ $ratingUser->rating == 0.5 ? 'checked' : null }} /><label
                                                    class="half" for="starhalf"
                                                    title="Sucks big time - 0.5 stars"></label>
                                                <input type="radio" class="reset-option" name="rating"
                                                    value="reset" />
                                            </fieldset>
                                        @else
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating"
                                                    value="5" /><label class="full" for="star5"
                                                    title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="rating"
                                                    value="4.5" /><label class="half" for="star4half"
                                                    title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="rating"
                                                    value="4" /><label class="full" for="star4"
                                                    title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="rating"
                                                    value="3.5" /><label class="half" for="star3half"
                                                    title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="rating"
                                                    value="3" /><label class="full" for="star3"
                                                    title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="rating"
                                                    value="2.5" /><label class="half" for="star2half"
                                                    title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="rating"
                                                    value="2" /><label class="full" for="star2"
                                                    title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="rating"
                                                    value="1.5" /><label class="half" for="star1half"
                                                    title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="rating"
                                                    value="1" /><label class="full" for="star1"
                                                    title="Sucks big time - 1 star"></label>
                                                <input type="radio" id="starhalf" name="rating"
                                                    value="0.5" /><label class="half" for="starhalf"
                                                    title="Sucks big time - 0.5 stars"></label>
                                                <input type="radio" class="reset-option" name="rating"
                                                    value="reset" />
                                            </fieldset>
                                        @endif

                                        <!-- Submit button-->
                                        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
