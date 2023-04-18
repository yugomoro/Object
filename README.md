#### 仕様書

-Q1-

Ferrari  価格：2000~5000万円 定員：2人 加速度：13m/s²
 
Honda  価格：400~600万円 定員：8人 加速度：5m/s²
  
Nissan  価格：100~300万円 定員：5人 加速度：8m/s²


-Q2-

Ferrari  通常時の車高：100mm


-Q3-

3社合わせて10~20台をランダムに生成


-Q4-

実際の加速度=加速度×{1－(0.05×乗員数)} となるように設計

####実行方法

準備：VSCode,XAMPPをデバイスにインストールし各種設定を行いPHPの実行環境を構築する

```launch.json
"configurations": [
    {
        "name": "Launch currently open script",
        "type": "php",
        "request": "launch",
        "program": "${file}",
        "cwd": "${fileDirname}",
        "port": 9000
    }
]
```
