<x-app-layout>
    @if(session('error'))
        <div class="text-red-600 font-bold">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex flex-col items-center">
        <h1 class="mt-7 mx-7 text-xl font-semibold max-sm:text-lg">注文手続き</h1>
        <form action="{{ route('order.store') }}" method="POST" class="w-2/5 max-sm:w-4/5">
            @csrf
            <ul>
                <li class="flex flex-col mt-2 max-sm:text-sm">
                    <label for="name">お名前</label>
                    <x-input-error :messages="$errors->get('name')"/>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="rounded-md" required>
                </li>
                <li class="flex flex-col mt-2 max-sm:text-sm">
                    <label for="postal_code">郵便番号</label>
                    <x-input-error :messages="$errors->get('postal_code')"/>
                    <input type="text" name="postal_code" class="rounded-md" required>
                </li>
                <li class="flex flex-col mt-2 max-sm:text-sm">
                    <label for="address">住所</label>
                    <x-input-error :messages="$errors->get('address')"/>
                    <input type="text" name="address" class="rounded-md" required>
                </li>
                <li class="flex flex-col mt-2 max-sm:text-sm">
                    <label for="phone_number">電話番号</label>
                    <x-input-error :messages="$errors->get('phone_number')"/>
                    <input type="tel" name="phone_number" class="rounded-md" required>
                </li>
                <li class="flex flex-col mt-2 max-sm:text-sm">
                    <label for="email">メールアドレス</label>
                    <x-input-error :messages="$errors->get('email')"/>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="rounded-md max-sm:text-sm" required>
                </li>
                <li class="flex flex-col mt-2 mb-3 max-sm:text-sm">
                    <label for="payment_method">お支払い方法</label>
                    <x-input-error :messages="$errors->get('payment_method')"/>
                    <select name="payment_method" class="rounded-md max-sm:text-sm">
                        <option value="クレジットカード">クレジットカード</option>
                        <option value="銀行振込">銀行振込</option>
                        <option value="代金引換">代金引換</option>
                    </select>
                </li>
                <div class="flex justify-center mb-5">
                    <x-primary-button class="px-auto">
                        注文確定
                    </x-primary-button>
                </div>
            </ul>
        </form>
    </div>
</x-app-layout>
