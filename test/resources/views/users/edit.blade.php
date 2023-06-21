<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            プロジェクト名
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <!-- ここにformを挿入してリダイレクトできるようにする -->
                            <form method="post" action="#">
                                @csrf
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
                                        {{-- ここにforeach --}}
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-3">ここにforeachの内容</td>
                                                <td class="w-10 text-center">
                                                    <input name="plan" type="radio">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                    {{-- ボタンを遷移できるように変更する --}}
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
