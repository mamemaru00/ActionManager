<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $projectData->project_name }}の編集画面
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
                                    <form method="post"
                                        action="{{ route('user.update', ['id' => $projectData->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="relative mb-4">
                                            {{-- プロジェクトの入力欄 --}}
                                            <h2 class="border-2 bg-gray-200 mt-4 flex justify-center">プロジェクト変更入力欄</h2>
                                            <div class="flex flex-col">
                                                {{-- 担当者をプルダウンで選択できるようにする --}}
                                                <label for="user_id" class="leading-7 text-sm text-gray-600 mt-3">
                                                    担当営業の選択
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <select name="user_id" id="user_id"
                                                    class="w-1/2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('user_id') ? 'border-red-500' : '' }}">
                                                    <option value="">営業担当者を選択してください</option>
                                                    @foreach ($userAllData as $userItem)
                                                        <option value={{ $userItem->id }}"
                                                            {{ old('user_id') == $userItem->id ? 'selected' : '' }}
                                                            {{ $projectData->user_id == $userItem->id ? 'selected' : '' }}>
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
                                                    value="{{ old('sales_in_charge', $projectData->sales_in_charge) }}">
                                                <x-error-display :error="$errors->first('sales_in_charge')" />

                                                <label for="order_amount" class="leading-7 text-sm text-gray-600 mt-3">
                                                    受注金額
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="number" id="order_amount" name="order_amount"
                                                    class="w-1/2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('order_amount') ? 'border-red-500' : '' }}"
                                                    value="{{ old('order_amount', $projectData->order_amount) }}">
                                                <x-error-display :error="$errors->first('order_amount')" />

                                                <label for="order_date" class="leading-7 text-sm text-gray-600 mt-3">
                                                    納期
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <input type="date" id="order_date" name="order_date"
                                                    class="w-1/5 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out {{ $errors->has('order_date') ? 'border-red-500' : '' }}"
                                                    value="{{ old('order_date', $projectData->order_date) }}">
                                                <x-error-display :error="$errors->first('order_date')" />

                                                <label for="status" class="leading-7 text-sm text-gray-600 mt-3">
                                                    ステータス
                                                    <span class="text-red-500">必須</span>
                                                </label>
                                                <div class="ml-3">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" class="form-check-input"
                                                            id="status1" value="有効化"
                                                            {{ $projectData->status == '有効化' ? 'checked' : '' }}>
                                                        <label for="status1" class="form-check-label">有効化</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="status" class="form-check-input"
                                                            id="status2" value="無効化"
                                                            {{ $projectData->status == '無効化' ? 'checked' : '' }}>
                                                        <label for="status2" class="form-check-label">無効化</label>
                                                    </div>
                                                    <x-error-display :error="$errors->first('status')" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="flex pl-4 mt-4 lg:w-1/2 w-full mx-auto pr-8">
                                            <button type="button" onclick="location.href='{{ route('user.index') }}'"
                                                class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">戻る</button>
                                            <button type="submit"
                                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">登録する</button>
                                        </div>
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
