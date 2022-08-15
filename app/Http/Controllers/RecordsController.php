<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\PriceRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Record;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //表示したい日付をrequestから取り出して定義する
        $date = $request->select_date;
        //request内の値がnullなら本日の日付にする
        if (is_null($date)){
            $date = new Carbon();
            $date = $date->format('Y-m-d');
        }

        $user_id = $request->id;
        //requestのnull判定
        if (is_null($user_id)){
            $user = null;
        }

        if (!is_null($user_id)) {
            //バリデーション
            $request->validate([
                'id' => ['required', 'int', 'max:10000']
            ]);

            //検索したuser_idがuserテーブルに存在するかチェック, 無かった場合はエラーメッセージを返す
            if (is_null(User::where('member_number', $user_id)->first())){
                return redirect()->route('records.index')->with(['status' => '会員番号 '. $user_id. ' 番は存在しません']);
            }

            $user = User::where('member_number', $user_id)->first();
//            $test = Record::where([['id', $user->id], ['date', 'LIKE', $date. "%"]])->first();
//            $test = Record::where([['user_id', $user->id], ['created_at', 'LIKE', $date. "%"]])->first();
//            dd($test);

            //検索したuser_idが既に本日の利用が無いかチェックする, 有った場合はエラーメッセージを返す
            if (!is_null(Record::where([['user_id', $user->id], ['created_at', 'LIKE', $date. "%"]])->first())){
                return redirect()->route('records.index')->with(['status' => '既に本日の施設利用履歴があります']);
            }

            //施設利用の登録に必要な選択肢を検索,格納する
//            $user = User::where('member_number', $user_id)->first();
            $user->prices = Price::where('class', $user->class)->get();
            $user->rents = Price::where('class', 5)->get();
        }

        //本日のrecordを抽出する
        $records = Record::where('date', 'LIKE', $date. "%")->get();

        foreach ($records as $record) {
            $record->name = User::find($record->user_id)->name;
            $record->member_number = User::find($record->user_id)->member_number;
            $user_class = User::find($record->user_id)->class;
            $items = PriceRecord::where('record_id', $record->id)->get('price_id');

            //レンタル品の情報を格納する配列用意する
            $item_rents = array();

            foreach ($items as $item) {
                $price_id = $item->price_id;
                $price_id_class = Price::where('id', $price_id)->value('class');

                //利用時間を追加
                //商品のカテゴリ（クラス）が利用時間に関する物をif分で選別
                if ($user_class == $price_id_class) {
                    $use_time = Price::find($price_id, ['item', 'price']);
                    $record->use_time = $use_time;
                }

                //レンタル品を下位の配列に入れる
                //商品のカテゴリ（クラス）がレンタル品に関する物（利用時間以外のもの）をif分で選別
                if ($user_class != $price_id_class) {
                    $item_rent = Price::find($price_id, ['item', 'price']);

                    //配列にプッシュ（追加する）ことでforeachを繰り返しながら追加していける
                    array_push($item_rents, $item_rent);
                }
            }
            $record->item_rents = $item_rents;
        }
//dd($records);
        return view('records.index', compact('user',  'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'id' => ['required', 'int', 'max:10000'], //'required|max:255',
            'prices' => ['required', 'array', 'max:6'], //arrayで配列, max:で中身の最大数を制限
            'prices.*' => ['int', 'max:100'], //配列の中身に対してのルール, *を使ってkeyは未指定
        ]);

        //利用者と登録日時をrecordsテーブルに保存
        $record = new Record();
        $record->user_id = $request->id;
        $record->date = now();
        $record->save();

        //1つのrecordに対して複数のpricesを保存していく
        $prices = $request->prices;

        foreach ($prices as $price) {
            $record_price = new PriceRecord();
            $record_price->record_id = Record::latest()->first()->id;
            $record_price->price_id = $price;
            $record_price->save();
        }

        return redirect()->route('records.index')->with(['success' => '利用登録の入力が完了しました']);
//        return redirect('records.index')->with(['status' => '利用登録の入力が完了しました']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
