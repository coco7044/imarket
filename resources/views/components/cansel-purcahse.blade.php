<div class="modal modalindex2 micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class=" text-xl text-gray-700 modal__title" id="modal-1-title">
                    キャンセル確認
                </h2>
                <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>

            <main class=" modal__content" id="modal-1-content">
                <p>
                    キャンセルしてよろしいですか？
                </p>

            </main>
            <footer class="modal__footer">
                <button type="button" onclick="location.href='{{ route('admin.adminPurchase.edit',['purchase_id' => $history->pid])}}'" class="modal__btn bg-indigo-300 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-400 rounded">確定</button>
                <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
            </footer>
        </div>
    </div>
</div>

<a data-micromodal-trigger="modal-1" href='javascript:;' class="modalindex1 z-index50 inline-block rounded bg-red-600 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none active:bg-red-500">キャンセルする</a>