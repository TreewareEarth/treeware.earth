<template>
    <section>
        <div class="w-full max-w-lg" action="" style="margin: 0 auto; margin-bottom: 40px;">
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                    <input v-model.trim="packageName"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="package-url-for-licence" type="text" placeholder="user/package" autocomplete="off">
                    <p class="text-gray-600 text-xs italic"></p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <button id="create-licence-btn" type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 border border-green-700 rounded" style="width: 300px">
                        Create
                    </button>
                </div>
            </div>
        </div>
        <div class="relative bg-white overflow-hidden shadow rounded-md select-none">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="text-2xl text-left pb-2 font-bold text-gray-900 block" style="border-bottom: 1px solid #f2f0f0">Licence</h2>
                <p class="mt-8 text-left">This package is <span class="text-blue-700 font-bold">Treeware</span>. If you use it in production, then we ask that you <span class="licence-dummy text-blue-700 font-bold">[**buy the world a tree**](https://plant.treeware.earth/<span class="text-orange-800">{{ packageName == '' ? '{user}/{package}' : packageName }}</span>)</span> to thank us for our work. By contributing to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.</p>
            </div>
            <i id="copy-licence-btn" @click="copyToClipboard(licenceText, $event)" title="click to copy" class="copy-licence-btn fa fa-clipboard cursor-pointer text-gray-400" style="font-size:24px;position:absolute;top:10px;right:10px"></i>
        </div>
        <div class="py-6 text-white">
            <p>Below are the Treeware badge which you can use in your project.</p>
            <p><small>(click on badge to copy markdown markup to use in your README.md file)</small></p>
        </div>
        <section class="justify-center">
            <span class="tooltip" @click="toolTipText = 'copied'" @mousemove="toolTipText = 'click to copy'">
                <img @click="copyToClipboard(treewareBadgeWithPlantTreeText)" class="cursor-pointer inline-block align-middle m-2" src="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGYAAAAUCAYAAAB/NUioAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH5AQSEjocYJs/yAAAC+tJREFUWMONmXts1dUdwD/n3Hvb23KLbaEPfGzIuukYiBszCxM3NjGUBDDFKItxG6MTZlDMFjeEMbOxkczGzZmZbGzSMakZcZPH0CVEJfISRx1WgYiKgu+WikBpb+8t93e+++P3O7977u/eW71J8+t5fB/n+z7fo0SETZs2tT7//PPXZrPZCmOM1kpjxKCUMiKitdZGRLQdK1S4DuTnlTLGGK1QoAAoWAd8fEojCFE4SwcBQdBa+/icfRbeiKGIL0sngB+Nf7tujNHnl7/wFQFAUAHjQnAEBeIvohSI+CtK+ZsCPIRAIYyPy+KRPEYHj785QMWYWCp9XX3bjqUTf/6X+KOPPtq6a9eu60XknmAnnng+nQDY8zyUUuFYAg6MMSilMMZYUH8sxmcqJE4BvMUf7g/wuHTsvItDRBARPPHC/e7PpeHy7+JRSoX8h/iMQSl/zTMeoAGDbwASCDyvAJ+/PD1jBHxD8veb/H5/r0Z8Qw748PH7YxOqblDO85++jSlBdKyxsfEHuVxupRWGiE/A/YYWETJVKIDovN3vwrmC01oXCdLOWyW5667yR6MT5d/d5867eACy17xboMhCoVp7LjxH4X7nrBG5RPFZj4ny7bjcxA8yb+l4Op1ORtFYy416imUmasmu5bu/6DhvYaZIwa4HuGsiEvLh4rNrLg677n5dvFG+Q3pIoeydMCVGCngPFRJE6yCy+fsCOKXy8xavhQnDHzZSEHhcnvaQN1Add7VfStjRXylvKbce9bRS/0fnCsOFKlBQOU+N8lsQtiIeX5rfQMKOREU8UNoZm/x68BVRoARM4Vck0ICdDzSiRCMYlCgMBsTi1TbrhfTinufpUocaTdgzZswgFouxd+/ecM7NN1EBlhtH8X4a2qVCVEmLduA/iSc/zgfKEdd7PCp1NSMm63uVySsnGRvDpcnPc3zwpWAOwAT5xbUcwipC8PL0lCLcLEURSMej1uceuqurK1zL5XI8/fTTdHV10draitaavXv3FgmklNCi3jBz5kzmzZvHypUri4R00003sXDhwpLW/c4777B69eqSdMp5cXllOAo1Asom6bxHXFz5Of40fSePvPlbdvRtCPhXdEz5F1ekpqGVZsTLcO/hW3k9fYhfXNHJ18Z9u4D+ix/v5pfHFofJv7XxNu5s+TVb3tvA3979TVjl+XnILxIQRTwoR4usysbp9evXc/ToUZYsWcLcuXN54YUXwjwBhRWbTd4WvpyF19bW0tjYWBSilFJs27aN5557DhFh6dKlTJo0iVWrViEiZLPZgnxjv27RUIpe9HxuceB5Hka8oIr0Qs9ZN3kzV9fN8M+Y9RAxGCPcOOF2rqy5mpVPtvPiu/vZsvgAP73iQX546BtIFgaGz/Lj7d/zlY7i3NgPkIsMIjCl5ussb1nrG3rGODnTepKtMqXYY6K/dDpNb28v9913H9u3b2fatGkFh128eDGzZ88mFovheR49PT088MAD1NXV8dBDD/Hhhx9y2WWXkcvl2LlzJ4899hg333wzsViMjRs3ksvlaG9vD+mPjIzQ29sb0s7lcuFYa83KlSupra0lHo/T1NTEpk2bSKVSLFy4kEQiQX9/P11dXRw8eJDa2lrWrFnDhAkT8DyPw4cP09HRUVDhuZ7s/n574CdUna2n89YnbSwCYF7zd3nv7EleqXqGyimw+chfWXbNz4KoJVzgAu83vRTiVf6tjsbKy1g35e88+/pTXDdpduHdRxXzoo0x2hhTYOmuR1iBtLW1oZTi1VdfLchHBw8eZPXq1dxwww3cf//9TJ8+nZaWFpRSJBIJPvroI5YvX86zzz7L3LlzMcawY8cOLly4wB133MHy5csL6FmLdr3XjgHGjh3LxIkTOXnyJJ2dnQwODrJo0SK6urpYsGABb7/9NosXL8YYw6pVq0gmkyxdupR77rmHqVOnMmPGjILK0D+7h+f8GeNxtvpdPmjuCVKA5+8Tw1BmiNqqenSFn8h71QkUirGx8YgI46oa2PHNt9hy3TF+cuWDGDziVPDHaU/y2qkjrDt6e4DTp2vEC76WHw/PeL7HRMOX6zl33XUXK1asQGvNM888w6FDh7jllltCwZ09e5YVK1bQ1NREIpEAoLm5mY8//hiAhx9+mPPnz7N161ZaW1tpbGxkaGgIgIGBgbDyKke/VF44fvw4HR0dxONx7r77bgDmzJlDa2sriUSCuro6ampquOSSS0in06xduzaEnT17Nvv37y8ZIfK3foEY6JgqWv/9/1bz8Ox/sf3aN8h6GVKJGgDOXfiIx177I090d5FVQ1z/+Rtpm3wb7w+/xVfrvoUI/L7nXiZ/5stopalNjqc20cSZkT7//LacDvJNPGiVlP1t3ryZPXv28MYbb5BKpaiqqgpzg4iwbt06zpw5w9q1azly5Ajbtm0ruC8kk0kGBwfDS2W0S1AuhLrz0VJbKUVVVRUA8XicbDbL448/Hq7ncjnS6TRaa7q7u3n55ZcBv4Dp6+srLrkRjAGtJGg1+WWyONHGdgeO6//y7b9O5BufnY+nLvC9aXczsb6FnMnxunRjqgWtFYdf28P1k+bxpeqvoXKaZKKaP8/ZgQgkdAXXX7qAZEWS3xxrR6MxApqQvtbRw0e/vb29nD59mvHjx4dKcX+VlZV0d3dz7NixsFobDZ+IcPLkSeLxODU1NcRisU/cX0p5drxv3z4qKytJpVLs2bOH7u5uJk+ezMjICP39/Vx11VX09PSwe/duhoeHufzyy4vw+sZiwn6WiP9/vgUVqE+EWIWm/ospjiT2MP0LX+fK5qn888jfUAjtLb/g0rGT0AmY1TKfmuRFvHLqvyx7upWZ6ydw7Z8nMHP9BLK5DP849Ahr9n0fgr6jxW87DXER0W51VCqU2LloWWyMYefOncyfP58FCxaQyWQAv1Jzw6ObwwC6u7s5ffo0GzZswPM8Fi1aNKoS3EosWiIfOHCAp556ivb2dpYsWYLWmnQ6TWdnJ2vWrKGjo4ONGzeGOJ944omikOnjAqXsF3437d9MrbsGheLOKb/kdu9e5u+9HGNgy6xXgz6ax9aXu+h871fEazTfariR73z2Dr/BqjQ97x/k0RMdVE2IkWzWaK38W75APKWoHBcPb/9+blWB56JVW1vbn5RSP7JKsOWniNDX10d9fT0VFRUFyrA5oqamhnQ6HVZIb775JtlslvHjx6O1pr+/n4aGBmKxGMYYTp06RWNjI1przpw5w7hx40in0ySTyZJl7vDwMJlMhvr6+nB+YGAArTVjxowJ92UyGQYHB2lpaeHUqVMMDQ1RV1eHiHDu3DmqqqpoaGjgxIkTpFIpkslkQZl9fsX+oE8p4WVxuDdHutfDjzGKeFJz0RcTIND0wWTSmWHeGTpG9aVxKut8rz9/coTazCVMariCox/+D2/cAFUXJ5z+mW/kZ49lqW6OU1EXK+hIO22hg6qtrW29iCz9JG8p1V5xLVdEiMViJZuMpdoin4ZONK980pz1rGgT0+UvCi8iDNy1zw9iLj632WVv9raszfmtFhV32/1BGDQgOYOu0Pkq21WMbbBFnwrcgVIvxksl1lICKCVwV7A2t0SFXq4LXao5OtoFMWoQpXhxBR9t14zaEbdVkUiQWxRKidMVCG7mtpcVw++B2e5NAO8XVYKqCNr8QQcMpcEYlLY8qGCsi3pwErSE4slkMpNOpwtK1qgFR7vErpVHFRAVZKnmYzSnRSu1ci2WKI/lyurRGq0l4Yy9eVuvMIGRB3S8XJ5+4B3lmqr+Hj/HhuW3yYV08nCAl8uXyiEDUB2rSetZs2btBh6JCuPTdJrdMBEVdjlBlLPaUkouZwDl3ntG49cdR99vbPL3DdkEAo16Zf6O4z+LufhV4GXunStqmIVzefomTx8wYg7Nab51a3zZsmVbAHbt2pXJZDLJ6FOuM7beE53XwROztWbtPgljn+uc9QicFhHjvNWE8Fpr43mefRq2hyp6Srb8BYorux70xorWjZivKPw8jwgmfKG1isw3j923Fs8UhlvP+Oqzzys2SgUPnGHOEdvnC59ofDVX6bGDrRfftnXFlev+8H+cRYqBF8dnYQAAAABJRU5ErkJggg==" title="click to copy" />
                <span v-if="!!packageName" class="tooltiptext">{{ toolTipText }}</span>
            </span>
            <span class="tooltip" @click="toolTipText = 'copied'" @mousemove="toolTipText = 'click to copy'">
                <img @click="copyToClipboard(treewareBadgeWithTreeIcon)" class="cursor-pointer inline-block align-middle m-2" src="data:img/png;base64,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" title="click to copy"/>
                <span v-if="!!packageName" class="tooltiptext">{{ toolTipText }}</span>
            </span>
            <span class="tooltip" @click="toolTipText = 'copied'" @mousemove="toolTipText = 'click to copy'">
                <img @click="copyToClipboard(treewareBadgeWithTreeCount)" class="cursor-pointer inline-block align-middle m-2" src="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGIAAAAUCAYAAAB23ujSAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH5AQSEg4fQridhQAAC8pJREFUWMONmXtwVNUdxz/n7Ca7eZhNkGzYUStUysNAFKF2gtQnKh0FmxmHjoiAjwbGEeogVp3BilptbcbHqNNi66sDjk6BWAHrVMQiBtsxNSZCKooGrKWQqIgJeW32nl//uI+99+Ym9s7s3D2v3znn9/v+nleJCBs3bpy3Z8+e8/r7+5NKKQBEBACl1LD//rd/rjsnvN5tu//9T9Q+YVpRa8Jn+bY1/nXdN//9nPwKARQgKBRuv/KNoJy1KIT8G5Q3jjjzFfiv4R4n0OfQLoqV9l1Q8eNX6yesXR/fsGHDvJ07d14CrPEzxn9J/0Wj2mGm+JlrjAkwOkqQfrp+wY3EcP//8DpjzIj03ceIQQS0VhgjKCWIgFIOcxUYcecKWinnjfe2hw1GVHCdsYUrTr8xyqGvfOttgfflunntiw3FoiBWWVl5fS6Xu0OhQAUvEkCnKA8ZWuvhKJQ846MYkUdRULM8QaEC6/2CVEq52Bsm4ACwQwwPjytt7zvw/c+Hz/Wg7ALJ/uXvILY2eGfHmxcAhgN/myUCStxO7/6CeAdWigmH+zuI9/X1JZVymCQ2ccuyhqMZQSzxUOe/iDfPBDXCGDOi2RIRbzzMPMuygjwcwQT5heGCIYqeN8eoPEtNnvdaY2sGfkNlv434+pUzT4GxBL8VNEbQWjDGpmdZgtLk93HpSn5f5WhIr3xTqkVE+5kaZZr8bT8jo/rDDB8GzIi+sAlRSnm/qHNECen/eTzhGxupLjJFBBxzhTj9YhAxnmYgBvHMTn69IBgx2GYKwOTHRfJtTx+Mpyn2voKI6LiLQKUUYvLq40e6i1C/eYlipBKFKBmOVI8TOIceBdHkNTKsWVrpwLncOSOdLywgJY5mi8F/jTzmDQmdJCvZPB1jEKVI6hJOTU7kk762/GUIe2KTF6R/zCWft595lUBAFPFhyBaoqKjgiSeeiERVLpdj6dKlgct6KFUMMx8Bx+67faTJItqkeAIRE9kfRT9Sm9zxgI9ynK/AKckJ/Pacv/J0x6/ZdvQZJyKK8ZvqPzGlbAYKRdYa4M72a/n4xPvcPeVpfjDm4sAZ/nnsLe7dv8wRhXB5+jpumXgfW/7zDM9//gAiBqX0MBMVN8bo8KG/+uorVq5ciVKKWbNmsWTJEq89NDQUiFTCztl15lH9USZopHXGmFHpjLRPmL5fu/KRlRUAsmXBg9UvcXZFrd0esBAxCLCg6kamlM3gzldvovnfTTQu+zu3T3yEm94/HzMgdPcfZ/UrSzwd6E4dxZTZgKk+6TxuPmOdveeAYIzl7Gn5/IxCBNs0Rdntzs5OAI4dO+a13ctfeeWVLFiwgEOHDjF58mQ++OADdu7cycqVKykpKaG3t5fXX3+dTZs2oZRizZo1nH322WitOXjwII8//jiTJ09m2bJlXH/99YgI69evp6mpiRdeeIGFCxdSW1vLrbfeyoMPPsj48eM9EGzevJmtW7dyxRVXMH/+fO8Me/fu5bnnnmPt2rVkMhlyuRz79u2joaEh0r/knSVoBb96ZzVF34zh2Wu2OdpnM/bKqmv5z/FDtCZ2kJymeGnf71n+/Ts8IQ5JlsPjWj0njlZogcrC7/DA9D/yt0/+wpzxcx2T6Clk3uk7bw3ocBTjolFr7R1ca00sFkMpRVFREalUikQiwYYNG9ixYwdr1qzh008/5eqrr2bjxo3U1dWRSCRYvHgxZ511FuvWrWPRokWUlZWxaNEimpubSSaT1NTUMG3aNFKpFHPmzMEYw8yZM+nq6kJE2LZtG8uXL+eyyy7jnXfeYeHChYgIyWQycIbXXnuNu+66i6KiIurr67n99tuZPn06tbW1nhDcn2VsR2wZA2JhjHC85HP+W9XmaIzrrIXewV7Ki04mntQIwlF1CIUiFRuLACcXp9l6/qf8+YL93Db1MdCGAlXEkzO281FnO/fvvclzF3b+YmEZ14mD2G8dHxaPj/CEk7jBwUFuu+02EokEM2bMoKCggKqqKp588knPDMydO5eZM2diWRYrVqzwhFhdXU1PTw/d3d3Mnj2bVCrF3r17mTZtGplMhnHjxrF9+3Zvz/vvv5/y8nIKCgq8HMZ/hsLCQrTWnHrqqfT29nLfffd5ay+++GKampoCd3Hz53wmbVAxUDH/uO10H21ZyxOXbOKV2Z8waPopjpcC8M3Ql7yw/3G2NG9kkBNcMvEq6qoXc7i/g1kVFyIGHm79OdWnn4NWmvLCk6koSHN8qNMWAqBweS/E3fD12wQQyEwd4ZWUlACQSCQA2LRpkxfBZLNZOjo6mDdvHp2dnWzZssWj09PTA0B7eztTp06loqKCe+65h1tuuYUbbriBeDzOrl27qKysZNWqVezZs4cXX3yRMWPGeEx2z+OewX2am5tpa7ORncvl6OzsHOZHjBEEg20QXOfptsEAlrFQaA7wDy78w3guOH0+lhpiac0qJoydRE6G+Mg0I0mb9r4Du5k7cT7VxeeicnGS8WKeunw7CBToQi457SqSiSJ+uf9GHyC8UonWfpVFCCRZ/oTMHY/KJ1pbWzHGUFtby+7du3n77beprKykrKyM9vZ2MpkMhw8f5q1db3HgwAEmTZqEiPDmm2+STqexLIsPP/yQN3a8wfTp0/n6668xxpBOpwFobGzkiy++4NJLLw3s6y+bGGP48ssvqampobW1lV27dtHf38/48ePz83Hme0g0nsOwM3cnUfVwatCFmrFnnkR74W5mTZrNlEwNm/Y+C8BPv/cLTis/A51QXDhxPqWJMto632X5jsv54e8zzFmfYc5TGQZzA7zY8gfublqKl5fgnkNQYY0QRs5KxYmP/YJzNSObzdLQ0MDq1avZsmWLF63ce++9PProo5xyyik0NDR4vmf//v1s3ryZ9957D2MMLS0taK3Zum0r1y25jra2NkSElpYWDh06xMMPPwxAX19fQDvDmfnatWt56KGHeP75572+xsZGb24AQBDImB+peYXpFecCsHLaOurNXczfbQux8fx/oZXGEouX2zbw9OfrKCiPc1F6AT85fYVXCGw7/C4bP2ugKBMjmYnZeBcb+wUnQWJszHPOAnYNy651aVVXV/c7rfUKfzjqd9LZbJZjx44xbtw47xLZbJaenh7Gjh3rITOXy3H8+HGqqqrQWnPkyBEqKirQWtPb20sul2PChAkcPHiQeDxOaalta7u6uigtLaW4uBiAo0ePkkqlSCaTdqW0u5t0Ok0ul6Orq4vBwUEymQyDg4OcOHGCMWPGeJphjKG7u5uioiLS6TQdHR2UlpaSTCYD4Xb3qj0O7JVdCwL6j+ToO2ohlqBjilhSkZqSAIT0f8+kr7+Pf/d9TMlpMRLltjM58VmOVH+G71ZOov1IC9bJJyjKxPJlK6VBLI7vz1I8Lk5hedynb/igwLuqrq7uKaB+NP8w2hNV4XTD3PDjCnm03MJPM1wY9NMcrRzvakksFou8T/fKJvfw+WTChSluxosX48qQbS3sYF8F5ogFkrNNWKCYlN802I7qF/lnfDRmjPY9IKo9UuLlr6aG2yPR9zPXHymFBeWf70/0ouh4muOWvMUVhFOdc783CE4tSIEYVMxmvojtR2xD5Dh3ZVAFyimbaFvD3JqU+53DR0/ZZWBXZewwGUU8mUwODAwMBDLZcIYbLkuHM9oo1PvXuf3hjDhMJyqzjipG+teHtSYMlKjziLgZrluz8n2PEBD3LSZfefZqEjZTjZML2Kx1aVvBdeKMK0GMEywoEJNzans5QFFSUNanL7rooreMMU9HfSMYqfIZjlgCkRcjl8nD7XAOE7VP1L5+ev6gwd8XFW57NFCAq/HBOpfxSumuBjsLvXqY+zgaSD4fsc/i7uPs7TN9TnHXuYNHqOWy9DUvx+vr6xudUHKgv78/KSJaa22MMdqmY7cty9JKKYOdiRv/PKVUoO3vd99AoD3aercdtc5PP7xP1Pqoc1kmd47LHIX9VU0psEy+7EHArAVqrTYTVV4qCuzSuvNxTYwEhGdZwQKfK5ukTp34UWbxyz+b+sBj/wNmpzWo3OuvQgAAAABJRU5ErkJggg==" title="click to copy"/>
                <span v-if="!!packageName" class="tooltiptext">{{ toolTipText }}</span>
            </span>
            <span class="tooltip" @click="toolTipText = 'copied'" @mousemove="toolTipText = 'click to copy'">
                <img @click="copyToClipboard(treewareBigBadge)" class="cursor-pointer inline-block align-middle m-2" src="data:img/png;base64,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" title="click to copy"/>
                <span v-if="!!packageName" class="tooltiptext">{{ toolTipText }}</span>
            </span>
        </section>

    </section>
</template>

<script>
    import algoliasearch from "algoliasearch/lite";
    import Clipboard from "clipboard/dist/clipboard";
    import VTooltip from "v-tooltip"


    export default {
        name: "LicenceGenerator",
        data() {
            return {
                packageName: '',
                licenceCreated:  false,
                toolTipText: 'click to copy',
            };
        },
        computed: {
            licenceText() {
                return `## Licence\
                This package is [Treeware](https://treeware.earth). If you use it in production, then we ask that you [**buy the world a tree**](https://plant.treeware.earth/${this.packageName}) to thank us for our work. By contributing to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.`;
            },
            treewareBadgeWithPlantTreeText() {
                return `[![Plant Tree](https://img.shields.io/badge/dynamic/json?color=brightgreen&label=Plant%20Tree&query=%24.total&url=https%3A%2F%2Fpublic.offset.earth%2Fusers%2Ftreeware%2Ftrees)](https://plant.treeware.earth/${this.packageName})`;
            },
            treewareBadgeWithTreeIcon() {
                return `[![Buy us a tree](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen)](https://plant.treeware.earth/${this.packageName})`;
            },
            treewareBadgeWithTreeCount() {
                return `[![Treeware](https://img.shields.io/badge/dynamic/json?color=brightgreen&label=Treeware&query=%24.total&url=https%3A%2F%2Fpublic.offset.earth%2Fusers%2Ftreeware%2Ftrees)](https://treeware.earth)`;
            } ,
            treewareBigBadge() {
                return `[![Buy us a tree](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen?style=for-the-badge)](https://plant.treeware.earth/${this.packageName})`;
            },
        },
        mounted() {

            $('#package-url-for-licence').on('focus', function() {
                $(this).removeClass('border-red-500');
            });

            $('#create-licence-btn').on('click', ()=> {
                $('#create-licence-btn').text('Creating Licence');

                setTimeout(()=>{
                    $('#create-licence-btn').text('Create');

                    if(!this.copyToClipboard(this.licenceText)) {
                        return;
                    }

                    $('#copy-licence-btn').addClass('text-green-700');
                }, 1000);
            });
        },
        methods: {
            copyToClipboard(copyData, event = false) {

                // error message when try to copy
                if(this.packageName == '') {
                    window.swal.fire({
                        text: "please enter {user/package} name in input to generate licence and badges!",
                        type: "error",
                        heightAuto: false
                    });
                    $('#package-url-for-licence').addClass('border-red-500');
                    return false;
                }

                if(!!event && event.target.classList.contains('copy-licence-btn') || false) {
                    $('#copy-licence-btn').addClass('text-green-900');
                    setTimeout(()=>{
                        $('#copy-licence-btn').removeClass('text-green-900');
                    }, 1000);
                }

                // replace markup in UI
                $('.licence-dummy').text('buy the world a tree');

                this.licenceCreated = true;

                // copy to clipboard
                var dummy = $('<textarea>').val(copyData).appendTo('body').select();
                document.execCommand('copy');
                $(dummy).remove();

                return true;
            },

        }
    }
</script>

<style lang="scss">
    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        left: 0px;
        right: 0px;
        top: -40px;
        z-index: 1;

        &::after {
            font-family: FontAwesome;
            position: absolute;
            left: 0px;
            right: 0px;
            text-align: center;
            bottom: -12px;
            content:"\f078";
            color: #000;
        }
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
