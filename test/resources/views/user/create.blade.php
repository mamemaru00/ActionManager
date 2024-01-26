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
                                <div class="table-auto w-full text-left whitespace-no-wrap">
                                    <form action="{{ route('user.store') }}" method="post">
                                        @csrf
                                        <div class="relative mb-4">
                                            {{-- 取引先入力欄 --}}
                                            <h2 class="border-2 bg-gray-200 flex justify-center">取引先選択欄</h2>
                                            <select name="trading_company_id" id="trading_company_id"
                                                class="w-1/2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 my-4 leading-8 transition-colors duration-200 ease-in-out">
                                                <option value="">取引先を選択してください</option>
                                                @foreach ($tradingCompanyData as $tradingCompany)
                                                    <option value="{{ $tradingCompany->id }}"
                                                        {{ old('trading_company_id') == $tradingCompany->id ? 'selected' : '' }}>
                                                        {{ $tradingCompany->trading_company_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="mb-2">※取引先が選択欄にない場合は、取引先入力欄に入力してください。</div>
                                            <h2 class="border-2 bg-gray-200 flex justify-center">取引先入力欄</h2>
                                            <label for="trading_company_name"
                                                class="leading-7 text-sm text-gray-600 mt-3">取引会社名</label>
                                            <input type="text" id="trading_company_name" name="trading_company_name"
                                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                value="{{ old('trading_company_name') }}">
                                            <label for="trading_company_manager_name"
                                                class="leading-7 text-sm text-gray-600 mt-3">取引先担当者</label>
                                            <input type="text" id="trading_company_manager_name"
                                                name="trading_company_manager_name"
                                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                value="{{ old('trading_company_manager_name') }}">
                                            <div class="flex flex-col">
                                                <label for="trading_company_tel"
                                                    class="leading-7 text-sm text-gray-600 mt-3">取引先担当者電話番号</label>
                                                <input type="tel" id="trading_company_tel"
                                                    name="trading_company_tel"
                                                    class="w-1/5 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    value="{{ old('trading_company_tel') }}">
                                            </div>

                                            {{-- プロジェクトの入力欄 --}}
                                            <h2 class="border-2 bg-gray-200 mt-4 flex justify-center">プロジェクト入力欄</h2>
                                            <div class="flex flex-col">
                                                <label for="project_code" class="leading-7 text-sm text-gray-600 mt-3">
                                                    プロジェクトコード
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="number" id="project_code" name="project_code"
                                                    class="w-1/2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('project_code') ? 'border-red-500' : '' }}"
                                                    value="{{ old('project_code') }}">
                                                <x-error-display :error="$errors->first('project_code')" />

                                                <label for="project_name" class="leading-7 text-sm text-gray-600 mt-3">
                                                    プロジェクト名
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="text" id="project_name" name="project_name"
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('project_name') ? 'border-red-500' : '' }}"
                                                    value="{{ old('project_name') }}">
                                                <x-error-display :error="$errors->first('project_name')" />

                                                {{-- 担当者をプルダウンで選択できるようにする --}}
                                                <label for="user_id" class="leading-7 text-sm text-gray-600 mt-3">
                                                    担当営業の選択
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <select name="user_id" id="user_id"
                                                    class="w-1/2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('user_id') ? 'border-red-500' : '' }}">
                                                    <option value="">営業担当者を選択してください</option>
                                                    @foreach ($userAllData as $userItem)
                                                        <option value="{{ $userItem->id }}"
                                                            {{ old('user_id') == $userItem->id ? 'selected' : '' }}>
                                                            {{ $userItem->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-error-display :error="$errors->first('user_id')" />

                                                <label for="sales_in_charge"
                                                    class="leading-7 text-sm text-gray-600 mt-3">
                                                    受注日
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="date" id="sales_in_charge" name="sales_in_charge"
                                                    class="w-1/5 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('sales_in_charge') ? 'border-red-500' : '' }}"
                                                    value="{{ old('sales_in_charge') }}">
                                                <x-error-display :error="$errors->first('sales_in_charge')" />

                                                <label for="order_amount" class="leading-7 text-sm text-gray-600 mt-3">
                                                    受注金額
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="number" id="order_amount" name="order_amount"
                                                    class="w-1/2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('order_amount') ? 'border-red-500' : '' }}"
                                                    value="{{ old('order_amount') }}">
                                                <x-error-display :error="$errors->first('order_amount')" />

                                                <label for="order_date" class="leading-7 text-sm text-gray-600 mt-3">
                                                    納期
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="date" id="order_date" name="order_date"
                                                    class="w-1/5 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('order_date') ? 'border-red-500' : '' }}"
                                                    value="{{ old('order_date') }}">
                                                <x-error-display :error="$errors->first('order_date')" />

                                                <label for="status" class="leading-7 text-sm text-gray-600 mt-3">
                                                    ステータス
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="text" id="status" name="status"
                                                    class="w-1/6 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('status') ? 'border-red-500' : '' }}"
                                                    value="{{ old('status') }}">
                                                <x-error-display :error="$errors->first('status')" />
                                            </div>

                                        </div>
                                        <input type="submit" value="登録"
                                            class=" bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 cursor-pointer">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
