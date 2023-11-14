-- 問1
-- 国名を全て抽出してください。
SELECT
    name
FROM
    countries
;

-- 問2
-- ヨーロッパに属する国をすべて抽出してください。
SELECT
    *
FROM
    countries
WHERE
    continent = 'Europe'
;

-- 問3
-- ヨーロッパ以外に属する国をすべて抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    NOT(
        continent = 'Europe'
    )
;


-- 問4
-- 人口が10万人以上の国をすべて抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    population >= 100000
;


-- 問5
-- 平均寿命が56歳から76歳の国をすべて抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    life_expectancy >= 56
AND life_expectancy <= 76
;


-- 問6
-- 国コードがNLB,ALB,DZAのもの市区町村をすべて抽出してください。
SELECT
    *
FROM
    `cities`
WHERE
    country_code = 'NLB'
OR  country_code = 'ALB'
OR  country_code = 'DZA'
;


-- 問7
-- 独立独立記念日がない国をすべて抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    indep_year IS null
;


-- 問8
-- 独立独立記念日がある国をすべて抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    indep_year IS NOT null
;


-- 問9
-- 名前の末尾が「ia」で終わる国を抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    name LIKE '%ia'
;

-- 問10
-- 名前の中に「st」が含まれる国を抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    name LIKE '%st%'
;


-- 問11
-- 名前が「an」で始まる国を抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    name LIKE 'an%'
;

-- 問12
-- 全国の中から独立記念日が1990年より前または人口が10万人より多い国を全て抽出してください。
SELECT
    *
FROM
    `countries`
WHERE
    indep_year < 1990
OR  population >= 100000
;

-- 問13
-- コードがDZAもしくはALBかつ独立記念日が1990年より前の国を全て抽出してください。
SELECT
    *
FROM
    `countries`
WHERE 
    (code = 'DZA'
OR  code = 'ALB')
AND indep_year < 1990
;


-- 問14
-- 全ての地方をグループ化せずに表示してください。
SELECT DISTINCT
    region
FROM
    `countries`
;

-- 問15
-- 国名と人口を以下のように表示させてください。シングルクォートに注意してください。
-- 「Arubaの人口は103000人です」
SELECT
    concat(name, 'の人口は', population, 'です') as POPULATION
FROM
    countries
;


-- 問16
-- 平均寿命が短い順に国名を表示させてください。ただしNULLは表示させないでください。
SELECT
    name,
    life_expectancy
FROM
    `countries`
WHERE
    life_expectancy IS NOT NULL
ORDER BY
    life_expectancy ASC
;

-- 問17
-- 平均寿命が長い順に国名を表示させてください。ただしNULLは表示させないでください。
SELECT
    name,
    life_expectancy
FROM
    `countries`
WHERE
    life_expectancy IS NOT NULL
ORDER BY
    life_expectancy DESC
;

-- 問18
-- 平均寿命が長い順、独立記念日が新しい順に国を表示させてください。
SELECT
    name,
    life_expectancy,
    indep_year
FROM
    `countries`
WHERE
    life_expectancy IS NOT NULL
ORDER BY
    life_expectancy DESC,
    indep_year DESC
;

-- 問19
-- 全ての国の国コードの一文字目と国名を表示させてください。
SELECT
    substring(code, 1, 1),
    name
FROM
    `countries`
;

-- 問20
-- 国名が長いものから順に国名と国名の長さを出力してください。
SELECT
    name,
    length(name)
FROM
    `countries`
ORDER by
    length(name) DESC
;

-- 問21
-- 全ての地方の平均寿命、平均人口を表示してください。(NULLも表示)
SELECT
    region,
    AVG(life_expectancy) as '平均寿命',
    AVG(population) as '平均人口'
FROM
    `countries`
GROUP BY
    region
;

-- 問22
-- 全ての地方の最長寿命、最大人口を表示してください。(NULLも表示)
SELECT
    region,
    MAX(life_expectancy) as '最大寿命',
    MAX(population) as '最大人口'
FROM
    `countries`
GROUP BY
    region
;
;

-- 問23
-- アジア大陸の中で最小の表面積を表示してください
SELECT
    MIN(surface_area) as 'アジアの最小面積'
FROM
    `countries`
WHERE
    continent = 'asia'
;

-- 問24
-- アジア大陸の表面積の合計を表示してください。
SELECT
    SUM(surface_area) as 'アジア大陸の表面積合計'
FROM
    `countries`
WHERE
    continent = 'asia'
;


-- 問25
-- 全ての国と言語を表示してください。一つの国に複数言語があると思いますので同じ国名を言語数だけ出力してください。
SELECT
    name,
    language
FROM
    `countries`
    JOIN
        countrylanguages
    ON  countries.code = countrylanguages.country_code
;

-- 問26
-- 全ての国と言語と市区町村を表示してください。
SELECT
    countries.name as '国名',
    cities.name as '市区町村名',
    countrylanguages.language
FROM
    `countries`
    JOIN
        `cities`
    ON  countries.code = cities.country_code
    JOIN
        countrylanguages
    ON  countries.code = countrylanguages.country_code
;

-- 問27
-- 全ての有名人を出力してください。左側外部結合を使用して国名なし（country_codeがNULL）も表示してください。
SELECT
    celebrities.name,
    countries.name
FROM
    `celebrities`
    LEFT OUTER JOIN
        countries
    ON  celebrities.country_code = countries.code
;

-- 問28
-- 全ての有名人の名前,国名、第一言語を出力してください。
SELECT
    celebrities.name,
    countries.name,
    lang.language
FROM
    (
        SELECT
            *
        FROM
            countrylanguages
        WHERE
            percentage IN(
                SELECT
                    MAX(percentage) AS max_p
                FROM
                    countrylanguages
                GROUP BY
                    country_code
            )
            )as lang
            JOIN
                celebrities
            ON  lang.country_code = celebrities.country_code
            JOIN
                countries
            ON  countries.code = celebrities.country_code
;

-- 問29
-- 全ての有名人の名前と国名をに出力してください。 ただしテーブル結合せずサブクエリを使用してください。
SELECT
    celebrities.name,
    (
        SELECT
            countries.name
        FROM
            `countries`
        WHERE
            countries.code = celebrities.country_code
    ) as '国名'
FROM
    `celebrities`
;

-- 問30
-- 最年長が50歳以上かつ最年少が30歳以下の国を表示させてください。
SELECT
    country_code,
    MAX(ce.age),
    MIN(ce.age)
FROM
    celebrities AS ce
GROUP BY
    country_code
HAVING MAX(ce.age) >= 50
AND MIN(ce.age) <= 30
;

-- 問31
-- 1991年生まれと、1981年生まれの有名人が何人いるか調べてください。ただし、日付関数は使用せず、UNION句を使用してください。
SELECT
    '1980' AS '誕生年',
    COUNT(id) as '人数'
FROM
    `celebrities`
WHERE
    birth BETWEEN '1980-1-1' AND '1980-12-31'
UNION
SELECT
    '1981' 　,
    COUNT(id)
FROM
    `celebrities`
WHERE
    birth BETWEEN '1981-1-1' AND '1981-12-31'
;

-- 問32
-- 有名人の出身国の平均年齢を高い方から順に表示してください。ただし、FROM句はcountriesテーブルとしてください。
SELECT
    countries.name as '国名',
    avg_age_table.avg_age as '平均年齢'
FROM
    `countries`
    JOIN
        (
            SELECT
                AVG(age) as avg_age,
                country_code
            FROM
                `celebrities`
            GROUP BY
                country_code
        ) as avg_age_table
    ON  avg_age_table.country_code = countries.code
ORDER BY
    avg_age_table.avg_age DESC
;
