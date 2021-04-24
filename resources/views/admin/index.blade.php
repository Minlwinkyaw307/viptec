@extends('admin.layouts.base')


@section('content')
    <header class="header flex items-center justify-between mb-6">
        <div class="header-left">
            <div class="back-next">
                <ul class="flex">
                    <li>
                        <button class="focus:outline-none">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="focus:outline-none">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-right">
            <div class="user-action">
                <ul class="flex items-center">
                    <li><a class="block" href="javascript:void(0);">
                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="dashboard">
        <div class="dashboard-header flex items-start justify-between">
            <div class="dashborad-header-text">
                <h1>Gösterge Paneli</h1>
                <p>Engin Admin Panel'e Hoşgeldin</p>
            </div>
            <div class="dashboard-header-action">
                <div class="dropdown">
                    <div class="dropdown-header flex items-center">
                        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <input type="text" name="daterange">
                    </div>
                </div>
            </div>
        </div>
        <div class="general-info mt-6">
            <ul class="flex">
                <li class="w-1/5">
                    <div class="general-info-box"><small class="block">Günlük Ziyaretçi</small><span class="block">45,748</span>
                        <div class="general-info-box-avarage flex items-center"><span class="block">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                      <polyline points="17 6 23 6 23 12"></polyline>
                    </svg></span>+44.50%</div>
                    </div>
                </li>
                <li class="w-1/5">
                    <div class="general-info-box"><small class="block">Toplam Sipariş</small><span class="block">21,553</span>
                        <div class="general-info-box-avarage flex items-center"><span class="block">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                      <polyline points="17 6 23 6 23 12"></polyline>
                    </svg></span>+31.33%</div>
                    </div>
                </li>
                <li class="w-1/5">
                    <div class="general-info-box"><small class="block">Dönüşüm Oranı</small><span class="block">37,271</span>
                        <div class="general-info-box-avarage flex items-center down"><span class="block">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                      <polyline points="17 18 23 18 23 12"></polyline>
                    </svg></span>-27.38%</div>
                    </div>
                </li>
                <li class="w-1/5">
                    <div class="general-info-box"><small class="block">Ort. Siparişler</small><span class="block">34,796</span>
                        <div class="general-info-box-avarage flex items-center"><span class="block">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                      <polyline points="17 6 23 6 23 12"></polyline>
                    </svg></span>+44.25%</div>
                    </div>
                </li>
                <li class="w-1/5">
                    <div class="general-info-box"><small class="block">Müşteriler</small><span class="block">18,347</span>
                        <div class="general-info-box-avarage flex items-center"><span class="block">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                      <polyline points="17 6 23 6 23 12"></polyline>
                    </svg></span>+52.41%</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="table-list mt-6 w-full">
            <div class="table-list-header flex items-center justify-between">
                <div class="table-list-header-text">
                    <h2>Kullanıcı Listesi</h2>
                    <p>Showing 1 to 10 of 57 entries</p>
                </div>
                <div class="table-list-header-input">
                    <div class="form-group">
                        <div class="form-element">
                            <input type="text" placeholder="Search in list">
                        </div>
                    </div>
                </div>
            </div>
            <table class="w-full" id="example">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jonas Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>30</td>
                    <td>2010/07/14</td>
                    <td>$86,500</td>
                </tr>
                <tr>
                    <td>Alex Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>30</td>
                    <td>2010/07/14</td>
                    <td>$86,500</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="table-list mt-6 w-full">
            <div class="table-list-header flex items-center justify-between">
                <div class="table-list-header-text">
                    <h2>Ürün Listesi</h2>
                    <p>Showing 1 to 10 of 57 entries</p>
                </div>
                <div class="table-list-header-input">
                    <div class="form-group">
                        <div class="form-element">
                            <input type="text" placeholder="Search in list">
                        </div>
                    </div>
                </div>
            </div>
            <table class="w-full" id="example">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ürün</th>
                    <th>Adet</th>
                    <th>Renk</th>
                    <th>Tarih</th>
                    <th>Fiyat</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="checkbox">
                            <label class="flex items-center">
                                <input type="checkbox"><span class="block checkbox-icon relative"></span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-image"><a class="block" href="javascript:void(0);"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80" alt=""></a></div>
                            <div class="product-box-content"><span class="block">Lorem ipsum dolor sit amet</span>
                                <p>lorem ipsum</p>
                            </div>
                        </div>
                    </td>
                    <td>1</td>
                    <td>Kırmızı</td>
                    <td>10/08/2020</td>
                    <td>2.888,00 TL</td>
                    <td>
                        <div class="badge success flex"><span class="block">Aktif</span></div>
                    </td>
                    <td>
                        <div class="process-buttons flex">
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </button>
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </button>
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="checkbox">
                            <label class="flex items-center">
                                <input type="checkbox"><span class="block checkbox-icon relative"></span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-image"><a class="block" href="javascript:void(0);"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80" alt=""></a></div>
                            <div class="product-box-content"><span class="block">Lorem ipsum dolor sit amet</span>
                                <p>lorem ipsum</p>
                            </div>
                        </div>
                    </td>
                    <td>1</td>
                    <td>Sarı</td>
                    <td>10/08/2020</td>
                    <td>2.888,00 TL</td>
                    <td>
                        <div class="badge waiting flex"><span class="block">Beklemede</span></div>
                    </td>
                    <td>
                        <div class="process-buttons flex">
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </button>
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </button>
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="checkbox">
                            <label class="flex items-center">
                                <input type="checkbox"><span class="block checkbox-icon relative"></span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-image"><a class="block" href="javascript:void(0);"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80" alt=""></a></div>
                            <div class="product-box-content"><span class="block">Lorem ipsum dolor sit amet</span>
                                <p>lorem ipsum</p>
                            </div>
                        </div>
                    </td>
                    <td>1</td>
                    <td>Turuncu</td>
                    <td>10/08/2020</td>
                    <td>2.888,00 TL</td>
                    <td>
                        <div class="badge error flex"><span class="block">İptal</span></div>
                    </td>
                    <td>
                        <div class="process-buttons flex">
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </button>
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </button>
                            <button class="focus:outline-none">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="flex items-start mt-6">
            <div class="area w-1/2">
                <div class="area-header">
                    <div class="area-title">
                        <h3>Form</h3>
                        <p>This information will be displayed publicly so be careful what you share.</p>
                    </div>
                </div>
                <div class="area-content">
                    <div class="form-group flex flex-wrap">
                        <div class="form-element w-full">
                            <label class="block" for="username">Kullanıcı Adı</label>
                            <input type="text" id="username" placeholder="www.example.com">
                        </div>
                        <div class="form-element w-full">
                            <label class="block" for="username">Meslek</label>
                            <select class="select2-area" data-placeholder="Select..">
                                <option></option>
                                <option value="1">First choice</option>
                                <option value="2">Second choice</option>
                                <option value="3">Third choice</option>
                                <option value="4">Fourth choice</option>
                                <option value="5">Fifth choice</option>
                                <option value="6">Sixth choice</option>
                                <option value="7">Seventh choice</option>
                                <option value="8">Eighth choice</option>
                                <option value="9">Ninth choice</option>
                            </select>
                        </div>
                        <div class="form-element w-full">
                            <label class="block" for="about">Hakkında</label>
                            <textarea data-autoresize id="about" placeholder="you@example.com"></textarea>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <div class="form-element w-full">
                            <label class="block" for="photo">Resim</label>
                            <div class="form-group flex items-center">
                                <div class="form-element">
                                    <div class="avatar"><img class="imgshow" src="https://coubsecureassets-a.akamaihd.net/assets/default-avatars/187-050b834aa2ef8e6508f03a2e7c6e70a994d77eebde95022f161d3728608ab6fa.png" alt=""></div>
                                </div>
                                <div class="form-element">
                                    <div class="file-input-with-button">
                                        <label class="block">
                                            <input class="imgload" type="file"><span class="block">Değiştir</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-element w-full">
                            <label class="block" for="file">Kapak Resmi</label>
                            <div class="file-input">
                                <label class="block">
                                    <input type="file" id="file">
                                    <div class="file-input-box flex flex-col items-center justify-center">
                                        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg><span class="block"><strong>Upload a file </strong>or drag and drop</span>
                                        <p>PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-element w-full">
                            <label class="block" for="about">Bildirimler</label>
                            <ul>
                                <li>
                                    <div class="checkbox">
                                        <label class="flex items-center">
                                            <input type="checkbox"><span class="block checkbox-icon relative"></span><span class="block checkbox-text">Email ile gönder</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label class="flex items-center">
                                            <input type="checkbox"><span class="block checkbox-icon relative"></span><span class="block checkbox-text">Sms ile gönder</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="form-element w-full">
                            <label class="block" for="about">Aktif / Pasif</label>
                            <ul>
                                <li>
                                    <div class="horizontal-check">
                                        <label class="flex">
                                            <input type="checkbox"><span class="block horizontal-check-area relative"><span class="block horizontal-check-icon"></span></span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="area-footer bg-grey">
                    <div class="form-group flex justify-end">
                        <div class="form-element flex">
                            <button class="focus:outline-none">İptal Et</button>
                            <button class="button-first focus:outline-none">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="area ml-6 w-1/2">
                <div class="area-header">
                    <div class="area-title">
                        <h3>Applicant Information</h3>
                        <p>Personal details and application.</p>
                    </div>
                </div>
                <div class="description-list">
                    <ul>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Full name</span></div>
                            <div class="description-list-box w-2/3">
                                <p>Jack Reacher</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Gender</span></div>
                            <div class="description-list-box w-2/3">
                                <p>Male</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Email address</span></div>
                            <div class="description-list-box w-2/3">
                                <p>jack@gmail.com</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Phone Number</span></div>
                            <div class="description-list-box w-2/3">
                                <p>00 000 00 00</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Application for</span></div>
                            <div class="description-list-box w-2/3">
                                <p>Backend Developer</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Salary expectation</span></div>
                            <div class="description-list-box w-2/3">
                                <p>$120,000</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">About</span></div>
                            <div class="description-list-box w-2/3">
                                <p>Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident.</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="description-list-box w-1/3"><span class="block">Attachments</span></div>
                            <div class="description-list-box w-2/3">
                                <ul>
                                    <li class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                            </svg><span class="block">resume_back_end_developer.pdf</span>
                                        </div><a class="block flex" href="javascript:void(0);">İndir</a>
                                    </li>
                                    <li class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                            </svg><span class="block">resume_back_end_developer.pdf</span>
                                        </div><a class="block flex-shrink-0" href="javascript:void(0);">İndir</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tabs mt-6 w-1/2">
            <div id="tabs">
                <div class="tabs-nav">
                    <ul class="flex relative">
                        <li><a class="flex items-center" href="#tabs-1">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>Tab Başlık 1</a></li>
                        <li><a class="flex items-center" href="#tabs-2">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>Tab Başlık 2</a></li>
                        <li><a class="flex items-center" href="#tabs-3">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>Tab Başlık 3</a></li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div id="tabs-1">
                        <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p>
                        <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p>
                    </div>
                    <div id="tabs-2">
                        <div class="form-group flex flex-wrap">
                            <div class="form-element w-full">
                                <label class="block" for="username">Kullanıcı Adı</label>
                                <input type="text" id="username" placeholder="www.example.com">
                            </div>
                            <div class="form-element w-full">
                                <label class="block" for="about">Hakkında</label>
                                <textarea data-autoresize id="about" placeholder="you@example.com"></textarea>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                            <div class="form-element">
                                <button class="button-first focus:outline-none">Kaydet</button>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-3">
                        <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p><span class="block">Lorem ipsum dolor sit amet consectetur</span>
                        <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p>
                        <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p><span class="block">Lorem ipsum dolor sit amet consectetur</span>
                        <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box mt-6">
            <ul class="flex">
                <li class="w-1/3">
                    <div class="box-list">
                        <div class="box-list-image"><a class="block" href="javascript:void(0);"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80" alt=""></a></div>
                        <div class="box-list-content flex flex-col">
                            <div class="box-list-content-in"><span class="block">Blog</span>
                                <h1><a class="block" href="javascript:void(0);">Lorem ipsum dolor sit</a></h1>
                                <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis.</p>
                            </div>
                            <div class="box-list-bottom">
                                <div class="user flex items-center">
                                    <div class="user-image"><a class="block" href="javascript:void(0);"><img src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></a></div>
                                    <div class="user-content"><span class="block"><a class="block" href="javascript:void(0);">Jack Reacher</a></span>
                                        <p>Mar 16, 2020 • 6 min read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="w-1/3">
                    <div class="box-list">
                        <div class="box-list-image"><a class="block" href="javascript:void(0);"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80" alt=""></a></div>
                        <div class="box-list-content flex flex-col">
                            <div class="box-list-content-in"><span class="block">Blog</span>
                                <h1><a class="block" href="javascript:void(0);">Lorem ipsum dolor sit</a></h1>
                                <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis.</p>
                            </div>
                            <div class="box-list-bottom">
                                <div class="user flex items-center">
                                    <div class="user-image"><a class="block" href="javascript:void(0);"><img src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></a></div>
                                    <div class="user-content"><span class="block"><a class="block" href="javascript:void(0);">Jack Reacher</a></span>
                                        <p>Mar 16, 2020 • 6 min read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="w-1/3">
                    <div class="box-list">
                        <div class="box-list-image"><a class="block" href="javascript:void(0);"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80" alt=""></a></div>
                        <div class="box-list-content flex flex-col">
                            <div class="box-list-content-in"><span class="block">Blog</span>
                                <h1><a class="block" href="javascript:void(0);">Lorem ipsum dolor sit</a></h1>
                                <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis.</p>
                            </div>
                            <div class="box-list-bottom">
                                <div class="user flex items-center">
                                    <div class="user-image"><a class="block" href="javascript:void(0);"><img src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></a></div>
                                    <div class="user-content"><span class="block"><a class="block" href="javascript:void(0);">Jack Reacher</a></span>
                                        <p>Mar 16, 2020 • 6 min read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
