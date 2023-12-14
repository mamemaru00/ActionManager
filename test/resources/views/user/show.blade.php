<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $projectScope->project_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                担当営業</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                納期</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                受注金額</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                受注日</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                有効化・無効化</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-3">{{ $projectScope->manager_name }}</td>
                                            <td class="px-4 py-3">
                                                {{ date('Y年m月d日 H時i分', strtotime($projectScope->sales_in_charge)) }}
                                            </td>
                                            <td class="px-4 py-3">{{ number_format($projectScope->order_amount) }}円
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ date('Y年m月d日 H時i分', strtotime($projectScope->order_date)) }}</td>
                                            <td class="px-4 py-3">{{ $projectScope->status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                <button type="button" onclick="location.href='{{ route('user.index') }}'"
                                    class="flex ml-auto text-white bg-gray-600 border-0 py-2 px-4 focus:outline-none hover:bg-gray-700 rounded text-lg">戻る</button>
                                <button type="button"
                                    onclick="location.href='{{ route('user.edit', ['id' => $projectScope->id]) }}'"
                                    class="ml-3 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集</button>
                                <button type="button"
                                    onclick="location.href='{{ route('user.destroy', ['id' => $projectScope->id]) }}'"
                                    class="ml-3 text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">削除</button>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
