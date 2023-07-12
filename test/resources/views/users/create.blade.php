<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            プロジェクト新規作成
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
                                    <form action="{{ route('users.store') }}" method="post">
                                        @csrf
                                        <tbody>
                                            <div class="relative mb-4">
                                                <label for="project_code"
                                                    class="leading-7 text-sm text-gray-600">プロジェクトコード</label>
                                                <input type="text" id="project_code" name="project_code"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                                <label for="project_name"
                                                    class="leading-7 text-sm text-gray-600">プロジェクト名</label>
                                                <input type="text" id="project_name" name="project_name"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <label for="manager_code"
                                                    class="leading-7 text-sm text-gray-600">担当者コード</label>
                                                <input type="number" id="manager_code" name="manager_code"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <label for="manager_name"
                                                    class="leading-7 text-sm text-gray-600">担当者名</label>
                                                <input type="text" id="manager_name" name="manager_name"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <label for="sales_in_charge"
                                                    class="leading-7 text-sm text-gray-600">受注日</label>
                                                <input type="date" id="sales_in_charge" name="sales_in_charge"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <label for="order_amount"
                                                    class="leading-7 text-sm text-gray-600">受注金額</label>
                                                <input type="text" id="order_amount" name="order_amount"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <label for="order_date"
                                                    class="leading-7 text-sm text-gray-600">納期</label>
                                                <input type="date" id="order_date" name="order_date"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <label for="status"
                                                    class="leading-7 text-sm text-gray-600">ステータス</label>
                                                <input type="text" id="status" name="status"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                            </div>
                                            <input type="submit" value="登録">
                                    </form>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
