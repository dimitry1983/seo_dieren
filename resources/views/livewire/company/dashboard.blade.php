<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="main-container flex relative">
        @include('parts.company.sidebar', ['active' => $active ?? ""])
        <div class="main-content flex-1 px-5 py-10 lg:p-16 max-w-[100%]">
            <div class="border border-solid border-[#CFD7E4] rounded-[15px] px-5 py-6 xl:px-16 xl:py-9">

                <div class="flex items-center mb-5 lg:mb-10">
                    <figure class="block relative w-[50px] h-[50px] min-w-[50px] lg:w-[70px] lg:h-[70px] rounded-full overflow-hidden border-2 border-solid border-[#d1d1d1] group-hover:border-primary duration-300 me-4"><img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt=""></figure>
                    <div>
                        <h2 class="font-medium text-xl lg:text-2xl text-[#271F30] mb-1">{{__('Hallo') }}  {{ Auth::user()->name }}!</h2>
                        <p class="text-[#888888] mb-0">{{devTranslate('dashboard_company.Bekijk hieronder de laatste ontwikkelingen op jouw bedrijfspagina','Bekijk hieronder de laatste ontwikkelingen op jouw bedrijfspagina')}}</p>
                    </div>
                </div>

                <div class="lg:grid flex flex-col gap-3 lg:gap-[33px] lg:grid-cols-3 mb-10">
                    <div class="col-span-1 relative bg-white rounded-[5px] px-5 py-1 lg:py-3 flex items-center text-lg text-[#271F30] font-medium cursor-pointer">
                        <span class="absolute left-0 top-0 bottom-0 h-[40px] w-[5px] rounded-lg bg-primary my-auto"></span>
                        <i class="fa-solid fa-user-clock text-primary text-lg lg:text-xl me-4"></i>
                        <span>{{devTranslate('dashboard_company.Activiteiten','Activiteiten')}}</span>
                        <span class="ms-auto w-[40px] h-[40px] rounded-full border-[2px] border-solid border-[#f5f6f7] flex items-center justify-center text-sm text-[#6B7A99]">20</span>
                    </div>

                    <div class="col-span-1 relative bg-white rounded-[5px] px-5 py-1 lg:py-3 flex items-center text-lg text-[#271F30] font-medium cursor-pointer">
                        <span class="absolute left-0 top-0 bottom-0 h-[40px] w-[5px] rounded-lg bg-primary my-auto"></span>
                        <i class="fa-solid fa-users text-primary text-lg lg:text-xl me-4"></i>
                        <span>{{devTranslate('dashboard_company.Gebruikers','Gebruikers')}}</span>
                        <span class="ms-auto w-[40px] h-[40px] rounded-full border-[2px] border-solid border-[#f5f6f7] flex items-center justify-center text-sm text-[#6B7A99]">1450</span>
                    </div>

                    <div class="col-span-1 relative bg-white rounded-[5px] px-5 py-1 lg:py-3 flex items-center text-lg text-[#271F30] font-medium cursor-pointer">
                        <span class="absolute left-0 top-0 bottom-0 h-[40px] w-[5px] rounded-lg bg-primary my-auto"></span>
                        <i class="fa-solid fa-box-check text-primary text-lg lg:text-xl me-4"></i>
                        <span>{{devTranslate('dashboard_company.Producten','Producten')}}</span>
                        <span class="ms-auto w-[40px] h-[40px] rounded-full border-[2px] border-solid border-[#f5f6f7] flex items-center justify-center text-sm text-[#6B7A99]">10</span>
                    </div>
                </div>

                <div class="panel-white bg-white py-4 px-5 lg:p-9 rounded-[8px]">
                    <div class="panel-white__toolbar flex items-center mb-7">
                        <h4 class="text-[#271F30] text-lg font-medium"><i class="fa-solid fa-user-clock text-primary text-xl me-3"></i> Activiteiten</h4>
                        <div class="custom-select ms-auto">
                            <i class="fa-solid fa-angle-down text-primary"></i>
                            <select class="ps-3 py-1">
                                <option value="">October</option>
                            </select>
                        </div>
                    </div>

                    <div class="pane-white__table h-[42vh] overflow-auto">
                        <table class="w-full">
                            <thead class="bg-[#F6F7F9]">
                                <tr>
                                    <th class="p-4 rounded-tl-[4px] rounded-bl-[4px]">Activiteit</th>
                                    <th class="p-4">Producten</th>
                                    <th class="p-4 rounded-tr-[4px] rounded-br-[4px]">Date - Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4 ">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 ">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center ">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="./public/img/user.jpg" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                                <tr>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">
                                        <div class="flex items-center">
                                            <figure class="block relative w-[40px] h-[40px] min-w-[40px] rounded-full overflow-hidden duration-300 me-4">
                                                <img class="abs-cover" src="{{ asset('pexilfy-dashboard/src/public/img/user.jpg')}}" alt="">
                                            </figure> Colijn heeft een digitaal product gedownload
                                        </div>
                                    </td>
                                    <td class="p-4 border-t-[2px] border-solid border-[#F6F7F9]">Ebook: hoe kun je meer klanten bereiken via instagram?</td>
                                    <td class="p-4 text-center border-t-[2px] border-solid border-[#F6F7F9]">12.09.2019 - 12.53 PM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
