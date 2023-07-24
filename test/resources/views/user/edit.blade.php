<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <form method="post" action="{{ route('user.update', ['id' => $project_data->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    有効化・無効化</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-3">現在〜〜{{ $project_data->status }}〜〜</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" class="form-check-input"
                                                            id="status1" value="有効化"
                                                            {{ $project_data->status == '有効化' ? 'checked' : '' }}>
                                                        <label for="status1" class="form-check-label">有効化</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" class="form-check-input"
                                                            id="status2" value="無効化"
                                                            {{ $project_data->status == '無効化' ? 'checked' : '' }}>
                                                        <label for="status2" class="form-check-label">無効化</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                    <button type="button" onclick="location.href='{{ route('user.index') }}'"
                                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">戻る</button>
                                    <button type="submit"
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">登録する</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
