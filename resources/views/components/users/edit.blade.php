<x-layout.layout>
    <div class="row">
        <div class="col-3">
            <x-shared.left-sidebar />
        </div>
        <div class="col-6">
            <x-shared.success-message />
            <div class="mt-3">
                <x-shared.user-edit-card :user="$user" />
            </div>
            <hr>

            @foreach ($ideas as $idea)
                <div class="mt-3">
                    <x-shared.idea-card :idea="$idea" />
                </div>
            @endforeach

        </div>
        <div class="col-3">
            <x-shared.search-bar />
            <x-shared.follow-box :user="$user" />
        </div>
    </div>
</x-layout.layout>
