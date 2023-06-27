<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $office_data->office_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            {{-- リダイレクト修正する最初に取得したidを渡すことになっている --}}
                            <form method="get" action="{{ route('users.show', ['id' => $project_data->first()->id]) }}">
                                @csrf
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                    プロジェクト</th>
                                                <th
                                                    class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach ($project_data as $projects)
                                            <tbody>
                                                <tr>
                                                    <td class="px-4 py-3">{{ $projects->project_name }}</td>
                                                    <td class="w-10 text-center">
                                                        <input name="plan" type="radio">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>

                                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                    <button type="submit"
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">詳細</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
