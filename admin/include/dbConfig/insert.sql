INSERT INTO `country` (`cnt_id`, `cnt_name`, `u_id`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES (NULL, 'INDIA', '1', 'Y', 'N', '2022-06-22 16:48:26.000000', NULL);

INSERT INTO `state` (`st_id`, `cnt_id`, `st_name`, `u_id`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES (NULL, '1', 'Gujarat', '1', 'Y', 'N', '2022-06-22 16:49:07.000000', NULL);

INSERT INTO `city` (`ct_id`, `cnt_id`, `st_id`, `city_name`, `u_id`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES (NULL, '1', '1', 'Rajkot', '1', 'Y', 'N', '2022-06-22 16:49:36.000000', NULL);

INSERT INTO `pincode` (`pin_id`, `ct_id`, `pin_code`, `u_id`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES (NULL, '1', '360006', '1', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL), (NULL, '1', '360002', '1', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL), (NULL, '1', '360001', '1', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL), (NULL, '1', '360003', '1', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL), (NULL, '1', '360004', '1', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL), (NULL, '1', '360005', '1', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL);

INSERT INTO `pages` (`pg_id`, `pg_name`, `pg_icon`, `pg_link`, `pg_order`, `pg_listing`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(NULL, 'Dashboard', '<i class="nav-icon fas fa-tachometer-alt"></i>', 'index.php', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'User', '<i class="nav-icon fas fa-user-circle"></i>', 'user.php', '2', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Category', '<i class="nav-icon fas fa-boxes"></i>', 'category.php', '2', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Membership', '<i class="nav-icon fas fa-user-tie"></i>', 'membership.php', '3', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Message', '<i class="nav-icon fas fa-inbox"></i>', 'message.php', '4', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Payment Management', '<i class="nav-icon fas fa-cash-register"></i>', 'payment.php', '5', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Order', '<i class="nav-icon fas fa-archive"></i>', 'order.php', '6', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Advertise', '<i class="nav-icon fas fa-ad"></i>', 'advertise.php', '7', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Ratings', '<i class="nav-icon fas fa-star"></i>', 'ratings.php', '8', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Lead', '<i class="nav-icon fas fa-headset"></i>', 'leads.php', '9', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'Customization', '<i class="nav-icon fas fa-sliders-h"></i>', 'customs.php', '10', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, 'User', '<i class="nav-icon fas fa-user-circle"></i>', 'user.php', '2', 'Y', 'Y', 'N', '2022-07-22 11:04:07', NULL),
(NULL, 'Location', '<i class="nav-icon fas fa-map-pin"></i>', 'location.php', '12', 'Y', 'Y', 'N', '2022-07-23 14:20:16', NULL),
(NULL, 'Keywords', '<i class="nav-icon fas fa-hashtag"></i>', 'key.php', '13', 'Y', 'Y', 'N', '2022-07-28 15:19:55', NULL),
(NULL, 'Employee', '<i class="nav-icon fas fa-user-plus"></i>', 'empReg.php', '14', 'Y', 'Y', 'N', '2022-07-30 10:02:27', NULL),
(NULL, 'Portfolio', '<i class="nav-icon fas fa-id-card-alt"></i>', 'portfolio.php', '15', 'Y', 'Y', 'N', '2022-08-03 17:51:40', NULL),
(NULL, 'Lead Management', '<i class="nav-icon fas fa-tasks"></i>', 'leadManagement.php', '16', 'Y', 'Y', 'N', '2022-08-04 09:29:35', NULL),
(NULL, 'Report', '<i class="nav-icon fas fa-file-invoice"></i>', 'reports.php', '17', 'Y', 'Y', 'N', '2022-08-04 10:12:45.000000', NULL),
(NULL, 'Complaints', '<i class="nav-icon fas fa-comment-dots"></i>', 'complaints.php', '18', 'Y', 'Y', 'N', '2022-08-04 10:14:56.000000', NULL),
(NULL, 'Approvals', '<i class="nav-icon fas fa-thumbs-up"></i>', 'approvalManagement.php', '19', 'Y', 'Y', 'N', '2022-08-04 10:19:13.000000', NULL),
(NULL, 'Contact Inquiry', '<i class=\"nav-icon fas fa-phone-square-alt\"></i>', 'conInq.php', '20', 'Y', 'Y', 'N', '2022-08-29 15:31:27', NULL),
(NULL, 'Inquiries', '<i class=\"nav-icon fas fa-comments\"></i>', 'inquiry.php', '21', 'Y', 'Y', 'N', '2022-08-30 15:47:14', NULL),
(NULL, 'My leads', '<i class="nav-icon fas fa-headset"></i>', 'myleads.php', '22', 'Y', 'Y', 'N', '2022-08-30 15:47:14', NULL),
(NULL, 'Dashboard', '<i class=\"nav-icon fas fa-tachometer-alt\"></i>', 'memIndex.php', '1', 'Y', 'Y', 'N', '2022-09-21 13:24:30.000000', NULL),
(NULL, 'Customer', '<i class=\"nav-icon fas fa-smile\"></i>', 'customer.php', '23', 'Y', 'Y', 'N', '2022-09-21 13:24:30.000000', NULL);



INSERT INTO `page_rights` (`pgr_id`, `pg_id`, `ut_id`, `pgr_right`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(NULL, '1', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '2', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '3', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '4', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '5', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '6', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '7', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '8', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '9', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '10', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '11', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '12', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '13', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '14', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '15', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '16', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '17', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '18', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '19', '1', 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, '20', '1', 'Y', 'Y', 'N', '2022-08-29 15:34:33', NULL),
(NULL, '21', '6', 'Y', 'Y', 'N', '2022-08-30 12:19:56.000000', NULL),
(NULL, '22', '3', 'Y', 'Y', 'N', '2022-08-30 12:19:56.000000', NULL);

INSERT INTO `page_rights` (`pgr_id`, `pg_id`, `ut_id`, `pgr_right`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES
(NULL, (SELECT `pg_id` FROM `pages` WHERE `pg_name` = 'Portfolio'), (SELECT `ut_id` FROM `user_type` WHERE `u_code` = 'M'), 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL),
(NULL, (SELECT `pg_id` FROM `pages` WHERE `pg_name` = 'Lead Management'), (SELECT `ut_id` FROM `user_type` WHERE `u_code` = 'M'), 'Y', 'Y', 'N', '2022-06-22 16:49:55.000000', NULL);
(NULL, (SELECT `pg_id` FROM `pages` WHERE `pg_name` = 'Inquiries'), (SELECT `ut_id` FROM `user_type` WHERE `u_code` = 'M'), 'Y', 'Y', 'N', '2022-08-30 12:19:56.000000', NULL),
(NULL, (SELECT `pg_id` FROM `pages` WHERE `pg_name` = 'Customer'), (SELECT `ut_id` FROM `user_type` WHERE `u_code` = 'SU'), 'Y', 'Y', 'N', '2022-08-30 12:19:56.000000', NULL);


INSERT INTO `user_type` (`u_type`, `u_code`, `active`, `deleted`, `visibility`, `createdDate`, `updatedDate`) VALUES 
('Super User', 'SU', 'Y', 'N', 'Y', '2022-08-09 16:11:22.000000', NULL),
('Admin', 'A', 'Y', 'N', 'Y', '2022-08-09 16:11:22.000000', NULL),
('Members', 'M', 'Y', 'N', 'Y', '2022-08-09 16:11:22.000000', NULL),
('Employee', 'E', 'Y', 'N', 'Y', '2022-08-09 16:11:22.000000', NULL);

INSERT INTO `user` (`u_id`, `u_name`, `u_number`, `u_password`, `ut_id`, `e_id`, `m_id`, `user`, `active`, `deleted`, `createdDate`, `updatedDate`) VALUES 
(NULL, 'Deepak Parmar', '7096700707', '2917f83db808485fb810b83ba76e8b2a6d04387bd004a22eee6977af205684b7cd689a56e948046b334a12412cd036c01f06dab749ad8bfb1776939111fa3797', '1', NULL, NULL, NULL, 'Y', 'N', '2022-08-09 19:49:50', NULL);






