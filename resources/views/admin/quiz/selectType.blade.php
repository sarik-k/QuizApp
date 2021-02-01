<!-- Modal -->
<div class="modal fade" id="selectType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            {{-- -----------------------------------------Modal-Header---------------------------------------- --}}

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>




            {{-- -----------------Modal-Body------------------ --}}

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-light w-100 mb-3 py-3" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#multipleChoice">
                            Multiple Choice
                        </button>
                        <button class="btn btn-light w-100 mb-3 py-3" data-bs-toggle="modal" data-bs-target="#multipleResponse">
                            True or False                            
                        </button>

                    </div>
                    <div class="col-md-6 mb-3 ">
                        <button class="btn btn-light w-100 mb-3 py-3" data-bs-toggle="modal" data-bs-target="#trueFalse">
                            Multiple Response
                        </button>
                        <button class="btn btn-light w-100 mb-3 py-3" data-bs-toggle="modal" data-bs-target="#shortText">
                            Short Text
                        </button>

                    </div>
                   
                </div>



            </div>

            {{-- -------------------------------Modal-Footer---------------------------------------- --}}

            {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div> --}}

        </div>
    </div>
</div>
<!---Modal Ends -->
