<div>
    <div class="row">
        <!-- البروفايل والصورة -->
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo text-center">
                    <!-- زر التعديل على الصورة -->
                    <a href="javascript:;" 
                       onclick="event.preventDefault();document.getElementById('sellerProfilePictureFile').click();" 
                       class="edit-avatar">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <!-- عرض الصورة الحالية -->
                    <img src="{{ $seller->Picture }}" alt="Profile Picture" 
                         id="sellerProfilePicture" class="avatar-photo">

                    <!-- حقل رفع الصورة -->
                    <input type="file" name="sellerProfilePictureFile" 
                           id="sellerProfilePictureFile" 
                           style="opacity: 0; position: absolute; z-index: -1;">
                </div>

                <h5 class="text-center h5 mb-0">{{ $seller->name }}</h5>
                <p class="text-center text-muted font-14">{{ $seller->email }}</p>
            </div>
        </div>

        <!-- بيانات المستخدم وتبويبات التعديل -->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <!-- التبويبات -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a wire:click.prevent="selectTab('personal_details')" 
                                   class="nav-link {{ $tab == 'personal_details' ? 'active' : '' }}" 
                                   data-toggle="tab" href="#personal_details" role="tab">
                                    Personal Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a wire:click.prevent="selectTab('update_password')" 
                                   class="nav-link {{ $tab == 'update_password' ? 'active' : '' }}" 
                                   data-toggle="tab" href="#update_password" role="tab">
                                    Update Password
                                </a>
                            </li>
                        </ul>

                        <!-- محتوى التبويبات -->
                        <div class="tab-content">

                            <!-- تبويب: التفاصيل الشخصية -->
                            <div class="tab-pane fade {{ $tab == 'personal_details' ? 'active show' : '' }}" 
                                 id="personal_details" role="tabpanel">
                                <div class="pd-20">
                                    <form wire:submit.prevent="saveSellerProfileInfo()" enctype="multipart/form-data">
                                        <x-alert-form />

                                        <div class="row">
                                            <!-- الاسم -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" wire:model.live="name" 
                                                           class="form-control" placeholder="Enter Seller Name">
                                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <!-- البريد الإلكتروني -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" wire:model.live="email" disabled 
                                                           class="form-control" placeholder="Enter Seller Email">
                                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <!-- اسم المستخدم -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" wire:model.live="username" 
                                                           class="form-control" placeholder="Enter Seller Username">
                                                    @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <!-- الهاتف -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" wire:model.live="phone" 
                                                           class="form-control" placeholder="Enter Seller Phone">
                                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <!-- العنوان -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" wire:model.live="address" 
                                                           class="form-control" placeholder="Enter Seller Address">
                                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>

                            <!-- تبويب: تحديث كلمة المرور -->
                            <div class="tab-pane fade {{ $tab == 'update_password' ? 'active show' : '' }}" 
                                 id="update_password" role="tabpanel">
                                <form wire:submit.prevent="updatePasswordSeller()" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- كلمة المرور الحالية -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" wire:model.live="current_password" 
                                                       class="form-control" placeholder="Enter Current Password">
                                                @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <!-- كلمة المرور الجديدة -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" wire:model.live="new_password" 
                                                       class="form-control" placeholder="Enter New Password" >
                                                @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <!-- تأكيد كلمة المرور -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" wire:model.live="confirm_new_password" 
                                                       class="form-control" placeholder="Confirm New Password">
                                                @error('confirm_new_password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Change</button>
                                </form>
                            </div>
                            <!-- نهاية تبويب كلمة المرور -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
