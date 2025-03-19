<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

?>

<nav class="nav-menu">
    <?foreach($arResult as $itemID => $arItem){
		?>
    <div class="nav-menu__item <?if(!empty($arItem["CHILDREN"])){?>nav-menu__item_drop<?}?>">
        <a class="nav-menu__link"
           href="<?echo  $arItem["LINK"]?>"><span>
				<?echo  $arItem["TEXT"]?>
			</span></a>
        <?if(!empty($arItem["CHILDREN"])){?>
        <div class="megamenu">
			<span class="megamenu__close">
                                        <svg class="icon__close-modal" width="40" height="40">
											<use xlink:href="/local/styles/img/general/svg-symbols.svg#close-modal"></use>
                                        </svg>
                                    </span>
            <div class="megamenu-wrap">
                <div class="content">
                    <div class="megamenu-content first-menu">
                        <div class="megamenu-top"><a class="megamenu__link"
                                                     href="<?echo  $arItem["LINK"]?>"><span><?echo  $arItem["TEXT"]?></span>
                                <svg class="icon__arrow-right" width="28" height="28">
                                    <use
									xlink:href="/local/styles/img/general/svg-symbols.svg#arrow-right">
                                    </use>
                                </svg>
                            </a>
                        </div>
						<?if($arItem["TEXT"] == "Ритуальные услуги"){?>
                      <div class="megamenu-menu is-title">
                            <?foreach($arItem["CHILDREN"] as $arItemChild){?>

						 <div>
                                                        <span class="megamenu-menu__title"><?echo $arItemChild["TEXT"]?></span>
									 <ul>
										 <?foreach($arItemChild["CHILDREN"] as $child){?>
                                                            <li class="megamenu-menu__item"><a
                                                                    class="megamenu-menu__link" href="<?echo $child["LINK"]?>">
													<?echo $child["TEXT"]?>
														</a>
                                                            </li>
										 <?}?>
                                                        </ul>

							</div>
		
                                <?}?>

                        </div>
						<?}else{?>
 <ul class="megamenu-menu">
                            <?foreach($arItem["CHILDREN"] as $arItemChild){?>
                                <?if(($arItemChild["TEXT"] == "Памятники" && $arItem["TEXT"] == "Каталог товаров" ) || $arItemChild["TEXT"] == "Статьи"){?>
                                    <li class="megamenu-menu__item"><button
                                                class="submenu-btn js-submenu-btn megamenu-menu__link"><span>
													<?echo $arItemChild["TEXT"]?>
													</span><svg
                                                    width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M20 5.52513L34.4749 20L20 34.4749L17.5251 32L27.7751 21.75H6.25V18.25H27.7751L17.5251 8.00001L20 5.52513Z"
                                                      fill="#001432" />
                                            </svg>
                                        </button>
                                    </li>
                                <?}else if($arItemChild["CHILDREN"]){?>
						 <div>
                                                        <span class="megamenu-menu__title"><?echo $arItemChild["TEXT"]?></span>
									 <ul>
										 <?foreach($arItemChild["CHILDREN"] as $child){?>
                                                            <li class="megamenu-menu__item"><a
                                                                    class="megamenu-menu__link" href="<?echo $child["LINK"]?>">
													<?echo $child["TEXT"]?>
														</a>
                                                            </li>
										 <?}?>
                                                        </ul>

							</div>
							<?}else{?>
                                    <li class="megamenu-menu__item"><a class="megamenu-menu__link"
                                                                       href="<?echo $arItemChild["LINK"]?>"><?echo $arItemChild["TEXT"]?></a>
                                    </li>
                                <?}}?>

                        </ul>
						<?}?>
                    </div>
                    <?if($itemID == 0){?>
                    <div class="megamenu-content second-menu is-hidden">
                        <div class="megamenu-top"><button
                                    class="megamenu__link js-submenu-return" href="catalog.html">
                                <svg class="icon__arrow-right" width="28" height="28">
                                    <use
									xlink:href="/local/styles/img/general/svg-symbols.svg#arrow-right">
                                    </use>
                                </svg>
                                <span>Вернуться назад</span>

                            </button>
                            <a href="/catalog/" class="submenu-show-all-link">Посмотреть все</a>
                        </div>
                        <ul class="megamenu-menu">
                            <?
                            $arSelect = Array("ID", "NAME","DETAIL_PAGE_URL");
                            $arFilter = Array("IBLOCK_ID"=>44,"!PROPERTY_SHOW_MENU" => false, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                            $res = CIBlockElement::GetList(Array("PROPERTY_SORT_MENU" => "ASC"), $arFilter, false, Array("nPageSize"=>20), $arSelect);
                            while($ob = $res->GetNextElement())
                            {
                                $arFields = $ob->GetFields();
                                ?>

                                <li class="megamenu-menu__item"><a class="megamenu-menu__link"
                                                                   href="<?echo $arFields["DETAIL_PAGE_URL"]?>">
                                        <?echo $arFields["NAME"]?>
                                    </a>
                                </li>
                            <?}?>




                        </ul>
                    </div>
                    <?}else if($itemID == 4){?>
                        <div class="megamenu-content second-menu is-hidden">
                            <div class="megamenu-top"><button
                                        class="megamenu__link js-submenu-return">
                                    <svg class="icon__arrow-right" width="28" height="28">
                                        <use
                                                xlink:href="/local/styles/img/general/svg-symbols.svg#arrow-right">
                                        </use>
                                    </svg>
                                    <span>Вернуться назад</span>

                                </button>
                                <a href="/info/articles/" class="submenu-show-all-link">Посмотреть все</a>
                            </div>
                            <ul class="megamenu-menu">
                                <?
                                $arSelect = Array("ID", "NAME","DETAIL_PAGE_URL");
                                $arFilter = Array("IBLOCK_ID"=>11,"!PROPERTY_SHOW_MENU" => false, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                                $res = CIBlockElement::GetList(Array("PROPERTY_SORT_MENU" => "ASC"), $arFilter, false, false, $arSelect);
                                while($ob = $res->GetNextElement())
                                {
                                    $arFields = $ob->GetFields();
                                    ?>

                                    <li class="megamenu-menu__item"><a class="megamenu-menu__link"
                                                                       href="<?echo $arFields["DETAIL_PAGE_URL"]?>">
                                            <?echo $arFields["NAME"]?>
                                        </a>
                                    </li>
                                <?}?>




                            </ul>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    <?}?>
    </div>

<?}?>


</nav>