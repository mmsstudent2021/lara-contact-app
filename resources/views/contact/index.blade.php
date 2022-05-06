@extends("layouts.app")
@section("content")

<div class="container">
    <div class="row">
        <div class="col">
            <div class="">
                <ul class="list-group">
                    @forelse($contacts as $contact)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="contact{{ $contact->id  }}">
                                    <label class="form-check-label" for="contact{{ $contact->id  }}">
                                        <div class="">
                                            <p class="fw-bold mb-0">
                                                {{ $contact->name }}
                                            </p>
                                            <p class="text-black-50 mb-0">
                                                {{ $contact->phone }}
                                            </p>
                                        </div>
                                    </label>
                                </div>

                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-fw  fa-paper-plane"></i>
                                </button>
                                <a href="{{ route('contact.edit',$contact->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-fw fa-pencil-alt"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-fw fa-trash-alt"></i>
                                </button>
                            </div>
                        </li>
                    @empty
                    @endforelse
                </ul>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <button class="btn btn-outline-primary" >Delete Selected</button>
                    </div>
                    <div class="mt-3">
                        {{ $contacts->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
